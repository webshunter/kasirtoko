<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class User {

	private static $barCHartId;
	private static $BarLabels;
	private static $BarColor;
	private static $BarValue;

	public static function setBarChart($aa){
		self::$barCHartId = $aa;
	}

	public static function BarLabels($ar){
		$str = "";
		foreach ($ar as $key => $value) {
			if ($key == 0) {
				$str .= '"'.$value.'"';
			}else{
				$str .= ', "'.$value.'"'; 
			}
		}
		self::$BarLabels = $str;
	}

	public static function BarColor($condition, $data){
		if ($condition == "all") {
			$color = "";
			$bar = self::$BarLabels;

			$explodebar = explode(",", $bar);

			for ($i=0; $i < count($explodebar) ; $i++) { 
				if ($i == 0) {
					$color .= '"'.$data.'"';
				}else{
					$color .= ',"'.$data.'"';
				}
			}
			self::$BarColor = $color;
		}else{
			$color = "";
			foreach ($variable as $key => $value) {
				if ($key == 0) {
					$color = '"'.$value.'"';
				}else{
					$color .= ',"'.$value.'"';
				}
			}
			self::$BarColor = $color;
		}
	}

	public static function BarValue($value){
		$nilai = "";
		foreach ($value as $key => $n) {
			if ($key == 0) {
				$nilai .= '"'.$n.'"';
			}else{
				$nilai .= ',"'.$n.'"';
			}
		}
		self::$BarValue = $nilai;
	}

	private static function BarScript(){
		return "

			<script>
                var BARCHARTHOME = $('#".self::$barCHartId."');
                var barChartHome = new Chart(BARCHARTHOME, {
                    type: 'bar',
                    options:
                    {
                        scales:
                        {
                            xAxes: [{
                                display: false
                            }],
                            yAxes: [{
                                display: false
                            }],
                        },
                        legend: {
                            display: false
                        }
                    },
                    data: {
                        labels: [".self::$BarLabels."],
                        datasets: [
                            {
                                label: 'Data Set 1',
                                backgroundColor: [".self::$BarColor."],
                                borderColor: [".self::$BarColor."],
                                borderWidth: 1,
                                data: [".self::$BarValue."]
                            }
                        ]
                    }
                });

            </script>


		";
	}

    private static function CreateCanvasBar() {
        return "<canvas id=".self::$barCHartId."></canvas>";
    }

    public static function CreateBar(){
    	$aa = self::CreateCanvasBar();
    	$bb = self::BarScript();
    	return $aa.$bb;
    }

    public static function sum($arr){
    	return array_sum($arr);
    }

    public static function average($arr){
    	$sum = array_sum($arr);
    	$average = $sum / count($arr); 
    	return $average;
    }

    private static $form_set_style;

 	public static function formStyle($aa = "")
   {
   		self::$form_set_style = $aa;
   }

   public static function formStart()
   {
   		return '
			<input type="hidden" name="_token" value="'.csrf_token().'" />
   		';
   }

   public static function formInputText($name ,$nameClass, $placeholder="", $value=""){
   		return '
			<div class="form-group">
              <label for="'.$nameClass.'" class="form-control-label">'.$name.'</label>
              <input type="text" name="'.$nameClass.'" id="'.$nameClass.'" required placeholder="'.$placeholder.'" class="'.self::$form_set_style.'" value="'.$value.'"/>
            </div>
   		';
   }

   public static function formInputNumber($name ,$nameClass, $placeholder="", $value=""){
   		return '
			<div class="form-group">
              <label id="'.$nameClass.'" class="form-control-label">'.$name.'</label>
              <input type="number" name="'.$nameClass.'" id="'.$nameClass.'" required placeholder="'.$placeholder.'" class="'.self::$form_set_style.'" value="'.$value.'"/>
            </div>
   		';
   }


   public static function formInputCurrency($currency ,$name, $nameClass, $placeholder="", $value=""){
   		return '

			<div class="form-group">
              <label for="'.$nameClass.'" class="form-control-label">'.$name.'</label>
              <input type="text" name="'.$nameClass.'" id="'.$nameClass.'" required placeholder="'.$placeholder.'" class="'.self::$form_set_style.'" value="'.$value.'"/>
            </div>
            
            <script>
              $("#'.$nameClass.'").keyup(function(event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40)return;
                // format rupiah
                $(this).val(function(index, value){
                  return "'.$currency.'"+value
                  .replace(/\D/g,"")
                  .replace(/\B(?=(\d{3})+(?!\d))/g,".");
                })
              });
            </script>

   		';
   }

   public static function formInputHidden($nameClass, $value = '')
   {
   		return '
              <input type="hidden" name="'.$nameClass.'" id="'.$nameClass.'" value="'.$value.'"/>
   		';
   }

   public static function formInputDate($name, $nameClass, $placeholder="", $value=""){
   		return '

			<div class="form-group">
              <label for="'.$nameClass.'" class="form-control-label">'.$name.'</label>
              <input type="text" name="'.$nameClass.'" id="'.$nameClass.'" required placeholder="'.$placeholder.'" class="'.

              	self::$form_set_style.'" value="'.$value.'"/>
            
            </div>
            
            <script>
              $("#'.$nameClass.'").datepicker({
                  uiLibrary: "bootstrap4"
              });
            </script>

   		';
   }

   public static function backDate($aa)
   {
   		$date = explode("-", $aa);
   		$date = $date[1].'/'.$date[2].'/'.$date[0];
   		return $date;
   }


  //  hellper khusus di teplate ini

   public static function SelectOptionFromDB($table, $value, $show, $golongan, $selected = "")
   {
      $table = DB::table($table)
      ->where('perusahaan', '=', Session::get('accounting-user')['nama_perusahaan'])
      ->where('golongan_akun', '=', $golongan)
      ->get();
      $option = "";
      foreach($table as $key => $nilai){
        if($selected != "" && $nilai->$value == $selected){
          $option .= "<option selected value='".$nilai->$value."'>".$nilai->$show."</option>";
        }else{
          $option .= "<option value='".$nilai->$value."'>".$nilai->$show."</option>";
        }
      }
      return $option;
   }

}