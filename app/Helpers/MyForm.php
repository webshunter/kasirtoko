<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MyForm {
   private static $db;
   private static $selectfromdb;

    public static function set_db($aa)
    {
        self::$db = $aa;
    }

    public static function set_select($aa)
    {
        self::$selectfromdb = $aa;
    }

    private static function set_option()
    {

        if(!isset(self::$selectfromdb["manual"])){
            $data_kondisi = self::$selectfromdb["kondisi"];
            $value = self::$selectfromdb["option"]["value"];
            $text = self::$selectfromdb["option"]["text"];
            $kondisi = $data_kondisi;
            $data = DB::table(self::$db)
            ->where($kondisi)
            ->get();
            $option = "";
            if(isset(self::$selectfromdb["selected"])){
                foreach($data as $key => $nilai){
                    if(isset(self::$selectfromdb["key"])){
                        $keyselect = self::$selectfromdb["key"];
                        if(self::$selectfromdb["selected"] == $nilai->$keyselect){
                            $option .= "<option selected value='".$nilai->$value."'>".$nilai->$text."</option>";
                        }else{
                            $option .= "<option value='".$nilai->$value."'>".$nilai->$text."</option>";
                        }
                    }else{
                        if(self::$selectfromdb["selected"] == $nilai->$value){
                            $option .= "<option selected value='".$nilai->$value."'>".$nilai->$text."</option>";
                        }else{
                            $option .= "<option value='".$nilai->$value."'>".$nilai->$text."</option>";
                        }
                    }
                }
            }else{
                foreach($data as $key => $nilai){
                    $option .= "<option value='".$nilai->$value."'>".$nilai->$text."</option>";
                }
            }
    
            return $option;
        }else{
            $data_manual = self::$selectfromdb["manual"];
            $option = "";
            if(isset(self::$selectfromdb["selected"])){
                foreach($data_manual as $thekey => $nilai_data){
                    if(self::$selectfromdb["selected"] == $thekey){
                        $option .= "<option selected value='".$thekey."'>".$nilai_data."</option>";
                    }else{
                        $option .= "<option value='".$thekey."'>".$nilai_data."</option>";
                    }
                }
            }else{
                foreach($data_manual as $thekey => $nilai_data){
                    $option .= "<option value='".$thekey."'>".$nilai_data."</option>";
                }
            }
            return $option;
        }
    }
    
    private static function get_select_db(){
        $data = self::$selectfromdb;
        $html = '
            <div class="form-group"> 
                <label for="'.$data['id'].'">'.$data['title'].'</label>
                <select required class="'.$data['class'].'" name="'.$data['name'].'" id="'.$data['id'].'">
                    <option value=""> -- pilih data -- </option>
                    '.self::set_option().'
                </select>
            </div>
        ';

        return $html;
    }

    public static function print_select(){
        echo self::get_select_db();
    }

    public static function hidden($name, $value){
        echo "<input type='hidden' name='".$name."' value='".$value."' />";
    }


    public static function input($data)
    {
        
        $placeholder = "";
        
        if(isset($data["placeholder"])){
            $placeholder = "placeholder='".$data["placeholder"]."'";
        }

        $class = "";

        if(isset($data["class"])){
            $class = "class='".$data["class"]."'";
        }

        $input_auto_id = "";
        $value_form = "";
        if(isset($data['value'])){
            if (!isset($data['auto-id'])) {
                $value_form = "value='".$data['value']."'";
            }else{

                $kondisi_db = "";
                if (isset($data['kondisi'])) {
                    foreach ($data['kondisi'] as $theKey => $nilaiData) {
                        if ($theKey == 0) {
                            $kondisi_db .= " WHERE ".$nilaiData[0]." ".$nilaiData[1]." '".$nilaiData[2]."' ";
                        }else{
                            $kondisi_db .= " AND ".$nilaiData[0]." ".$nilaiData[1]." '".$nilaiData[2]."' ";
                        }
                    }
                }

                $data_input = DB::select("SELECT MAX(".$data['auto-id']['row'].") AS ".$data['auto-id']['row']." FROM ".self::$db.$kondisi_db)[0];
                $the_row = $data['auto-id']['row'];
                $the_row_value = $data_input->$the_row;
                $the_row_value += 1;
                $the_row_len = strlen($the_row_value);
                $total_format = strlen($data['auto-id']['format']) - $the_row_len; 

                $the_auto_id = "";
                for($i= 0; $i < $total_format; $i++){
                    $the_auto_id .= "0";
                }
                
                if ($data['value'] != "") {
                    $the_auto_id = $data['value'];
                }else{
                    $the_auto_id .= $the_row_value;
                }


                // dump($data_input->$the_row);
                $value_form = "value='".$the_auto_id."' disabled";
                $input_auto_id = "<input type='hidden' name='".$data['name']."' value='".$the_auto_id."' />";
            }
        }

        $format_rupiah = "";
        
        if(isset($data['currency'])){
            $format_rupiah = '
            <script>
            $("#'.$data['name'].'").keyup(function(event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40)return;
                // format rupiah
                $(this).val(function(index, value){
                    return "'.$data['currency'].'"+value
                  .replace(/\D/g,"")
                  .replace(/\B(?=(\d{3})+(?!\d))/g,".");
                })
              });
            </script>
            ';
        }

        $tag = "";
        $tagend = "";
        if(isset($data['tag'])){
            $tag = '
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="'.$data['tag'].'"></i></span>
                </div>
            ';

            $tagend = '</div>'; 
        }

        $mask = "";
        $maskscript = "";
        if(isset($data['mask'])){
            $mask = '
                data-inputmask='."'".'"mask":"'.$data['mask'].'"'."'".'
            ';
            $maskscript = "
                <script>
                    $('#".$data['name']."').inputmask()
                </script>
            "; 
        }

        $info = "";
        if(isset($data['info'])){
            $info .= '<smal style="font-size:12px;display:block;color: #777; padding: 5px;">'.$data['info'].'</smal>';
        }

        $autocomplete = "";
        if (isset($data['autocomplete'])) {
            $autocomplete = "autocomplete='".$data['autocomplete']."'";
        }


        $html = '
            <div class="form-group">
                <label for="'.$data['name'].'">'.$data['title'].'</label>
                '.$tag.'
                <input type="'.$data['type'].'" id="'.$data['name'].'" name="'.$data['name'].'" 
                '.$mask.'
                '.$class.'
                '.$placeholder.'
                '.$value_form.'
                '.$autocomplete.'
                required
                />
                '.$input_auto_id.'
                '.$info.'
                '.$maskscript.'
                '.$tagend.'
            </div>
            '.$format_rupiah.'
        ';

        echo $html;
    }


    public static function start($action, $method)
    {
        $html = '
            <form action="'.url($action).'" method="'.$method.'">
            <input type="hidden" name="_token" value="'.csrf_token().'" />
        ';
        echo $html;
    }


    public static function end($data)
    {
        $html = '

            <a href="'.url($data['back-url']).'" class="'.$data['back-button'].'"> <i class="fas fa-window-close"></i> close</a>
            <button id="'.$data['id-submit'].'" type="submit" class="'.$data['submit-button'].'"> <i class="fas fa-save"></i> Save</button>
        </form>
        
        ';

        echo $html;
    }

}