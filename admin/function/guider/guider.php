<?php 
   
    // ///////////////////////////////////////
    include 'guider-server.php';
    //use TourObject\Tour;
  //  include 'model/connectDB.php';
    use model\connectDB;      
    
    class TXSGuider{
        private $connectDB="";
        public $guider="";
        public function __construct(){
            $this->guider=new ArrayObject();
            $this->connectDB=new connectDB("tctdlich");
            $this->connectDB->connect();
        }
        public function HienThi(){
            $select="select * from tour_guider";
            $i=0;
            $result=mysqli_query( $this->connectDB->conn, $select);
            if(mysqli_num_rows($result)>0){
                
                while($row=mysqli_fetch_assoc($result)){
                    $row=(object) $row;
                   $this->guider[$i]=$row;
                   $i++;
                  
                }
            }
            
            return $this->guider;
        }
        public function Them($guider){
            $guider;
            $sql="insert into tour(id_guider,name_guider,birthday,address,tel,img_url)
                values('$guider->id_gudier','$guider->name_guider','$guider->birthday','$guider->tel','$guider->img_url')";
            //$result=mysqli_query( $connectDB->conn, $select);

            if (mysqli_query($this->connectDB->conn, $sql)) {
                return true;
            
            } else {
               return false;
            }
        }
        public function Sua($guider){
            $sql="
            update from tour_guider
            set name_guider='$guider->name_guider';
            update from tour_guider
            set birthday='$guider->birthday';
            update from tour_guider
            set tel='$guider->tel';
            update from tour_guider
            set  img_url->img_url='$guider->img_url';
            ";
        }
        public function Xoa($id){
            $sql="delete from tour_guider where id_guider ='".$id."'";
            if (mysqli_query($this->connectDB->conn, $sql)) {
                return true;
            } else {
                return false;
            }
        }
    }
    // $tour=new TXSTour();
    // print_r($tour->HienThi()) ;   
?>