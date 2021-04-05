<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class gugusDatatable extends Model
{

	private $query;
	private $limit;
	private $key;
	private $table_row;
	private $table_draw;
	private $table_id_edit;
	private $table_name;
	private $button_view;
	private $action;

	public function datatable($data = "")
	{

		$query = "SELECT ";
		if(isset($data['select'])){
			if (!isset($data['leftJoin'])) {
				foreach ($data['select'] as $key => $value) {
					if ($key == 0) {
						$query .= $value;
					}else{
						$query .= ','.$value;
					}
				}
			}else{
				$number = 0;
				foreach ($data['select'] as $key => $value) {
					if ($number == 0) {
						foreach ($value as $num => $nilai) {
							if ($num == 0) {
								$query .= $key.'.'.$nilai;
							}else{
								$query .= ','.$key.'.'.$nilai;
							}
						}
					}else{
						foreach ($value as $num => $nilai) {
							$query .= ','.$key.'.'.$nilai;
						}
					}
					$number++;
				}
			}
		}else{
			$query .= " * ";
		}
		
		$query .= " FROM ";

		$query .= " ".$data['table']." ";
		$this->table_name = $data['table'];

		if (isset($data['leftJoin'])) {
			foreach ($data['leftJoin'] as $key => $value) {
				$query .= " LEFT JOIN ".$key." ON ".$value[0]." ".$value[1]." ".$value[2]."";
			}
		}

		if ($data['where']) {
			$query .= " WHERE ";
			foreach ($data['where'] as $keys => $value) {
				if ($keys == 0) {
					$query .= $value[0].' '.$value[1].' "'.$value[2].'"';
				}else{
					$query .= ' AND '.$value[0].' '.$value[1].' "'.$value[2].'"';
				}
			}
		}

		if (isset($data['search'])) {
			$nilai_pencarian = $data['search']['value'];
			$query .= "AND (";
			foreach ($data['search']['row'] as $keys => $value) {
				if ($keys == 0) {
					$query .= $value.' LIKE "%'.$nilai_pencarian.'%"';
				}else{
					$query .= " OR ".$value.' LIKE "%'.$nilai_pencarian.'%"';
				}
			}
			$query .= ") ";
		}

		if (isset($data['order'])) {
			if ($data['order']['order-data'] != "") {
				$order_condition = $data["order"]['order-data'][0]["dir"];
				$order_column = $data['order']['order-data'][0]['column'];
				$order_by = "";
				foreach ($data['order']['order-option'] as $keys => $value) {
					if ($keys == $order_column) {
						$order_by = $value;
					}
				}
				$query .= " ORDER BY ".$order_by." ".$order_condition." ";
			}else{
				$query .= " ORDER BY ".$data['order']['order-default'][0]." ".$data['order']['order-default'][1]." ";
			}
		}

		if (isset($data['table-show'])) {
			$this->key = $data['table-show']['key'];
			$this->table_row = $data['table-show']['data'];
		}

		if (isset($data['table-draw'])) {
			$this->table_draw = $data['table-draw'];
		}

		if (isset($data['limit'])) {
			$this->limit = "LIMIT ".$data['limit']['start'].",".$data['limit']['end']; 
		}

		if (isset($data['action'])) {
			$this->action = $data['action'];
		}


		$this->query = $query;
	}

	private function query_data()
	{
		return DB::select($this->query);
	}

	private function query_limit(){
		return DB::select($this->query.$this->limit);
	}

	private function query_count(){
		return count($this->query_data());
	}


	private function buat_table(){
        $arr = [];
        $theTable = $this->query_limit();
        $show_table = $this->table_row;
        $key_id = $this->key;
        foreach($theTable as $key => $value){
            $child = [];
            $child[] = $key + 1;
            foreach($show_table as $evelop => $variable){
            	$perkalian = " * ";
            	if (preg_match("/{$perkalian}/i", $variable)) {
            		$kali_data = explode($perkalian, $variable);
            		$data1 = $kali_data[0];
            		$data1 = str_replace("Rp ", "", $value->$data1);
            		$data1 = str_replace(".", "", $data1);
            		$data2 = $kali_data[1];
            		$data2 = str_replace("Rp ", "", $value->$data2);
            		$data2 = str_replace(".", "", $data2);
            		$child[] = 'Rp '.number_format(($data1*$data2),2,',','.');
            	}else {
                	$child[] = $value->$variable;
            	}
            }


            if ($this->action == "standart") {
	            $child[] = "
	            <center>
	            	<button data-id='".$value->$key_id."' class='btn btn-success edit'>edit</button>
	            	<button data-id='".$value->$key_id."' class='btn btn-danger delete'>hapus</button>
	            </center>
	            ";
            }elseif ($this->action == "delete-only") {
            	$child[] = "
	            <center>
	            	<button data-id='".$value->$key_id."' class='btn btn-danger delete'>hapus</button>
	            </center>
	            ";
            }

            array_push($arr, $child);
        }
        return $arr;
    }

	public function query_dump(){
		dump($this->query_limit());
		echo($this->query_count());
	}


	public function table_show(){
		$r = array(
            "draw"            => $this->table_draw,
            "recordsTotal"    => intval( $this->query_count() ),
            "recordsFiltered" => intval( $this->query_count() ),
            "data"            => $this->buat_table(),
        );
        echo json_encode($r);
	}

	public static function post($data){
      $nilai = "";
      if (isset($_POST[$data])) {
        $nilai = $_POST[$data];
      }
      return $nilai;
   }

   public static function search(){
   		$pencarian = "";
   		if (isset($_POST['search']['value'])) {
   			$pencarian = $_POST['search']['value'];
   		}
   		return $pencarian;
   }

}
