<?php
      class Database{
      	private $hostname = 'localhost';
      	private $username = 'root';
      	private $pass ='';
      	private $dbname = 'tdh';
      	private $conn = NULL;
      	private $result = NULL;

      	public function connect()
      	{
      		$this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
      		if(!$this->conn){
               echo "Kết Nối Thất Bại";
               exit();
      		}
      		else{
      			mysqli_set_charset($this->conn,'UTF8');
      		}
      		return $this->conn;
      	}
      	public function execute($sql)
      	{
      		$this->result = $this->conn->query($sql);
      		return $this->result;
      	}

      	public function getData()
      	{
      		if($this->result)
      		{
      			$data = mysqli_fetch_array($this->result);
      		}
      		else{
      			$data= 0;
      		}
      		return $data;
      	}
      	public function getAllData($table)
      	{
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
      		if($this->num_row()==0)
            {
               $data= 0;
            }
      		else{
      			while($datas = $this->getData()){
      				$data[] = $datas; 
      			}
      		}
      		return $data;
      	}
          public function getDataID($table,$id)
         {
            $sql = "SELECT * FROM $table WHERE id = '$id'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDatamay($table,$tenmay,$ngaybatdau)
         {
            $sql = "SELECT * FROM $table WHERE tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataloginID($table,$username,$password)
         {
            $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataMaThe($table,$mathe)
         {
            $sql = "SELECT * FROM $table WHERE mathe LIKE '%$mathe%'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getSumHieuSuat($table,$tenmay,$ngaybatdau,$congdoan,$mathe,$ngaydukien)
         {
            $sql = "SELECT tiendo as hieusuat FROM $table WHERE mathe = '$mathe'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getcongdoan($table,$mathe)
         {
            $sql = "SELECT sum(hieusuat) as hieusuat FROM $table WHERE mathe = '$mathe'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
          public function getCountHieuSuat($table,$mathe)
         {
            $sql = "SELECT count(hieusuat) as count FROM $table WHERE mathe = '$mathe'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataNgayBatDau($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien)
         {
            $sql = "SELECT max(ngaybatdau1) as ngaybatdau1 FROM $table WHERE mathe = '$mathe' and nguoithuchien = '$nguoithuchien' and tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
        public function getDataNgayBatDauCongDoan($table,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE mathe = '$mathe' and mathe1 = '$mathe1' and nhomthuchien = '$nhomthuchien' and nhomthuchien1 = '$nhomthuchien1' and tenmay = '$tenmay' and tenmay1 = '$tenmay1' and ngaybatdau = '$ngaybatdau' and ngaybatdau1 = '$ngaybatdau1' and ngaydukien = '$ngaydukien' and ngaydukien1 = '$ngaydukien1' and bophan = '$bophan'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataTenMay($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE mathe = '$mathe' and nhomthuchien = '$nguoithuchien' and tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and bophan = '$bophan'";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
         public function getDataTenMayLine($table,$mathe,$nhomthuchien,$tenline,$ngaybatdau,$ngaydukien,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE mathe = '$mathe' and nhomthuchien = '$nhomthuchien' and tenline = '$tenline' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and bophan = '$bophan'";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
         public function gettiendo($table,$mathe,$tenmay,$ngaybatdau,$ngaydukien,$congdoan)
         {
            $sql = "SELECT tiendo FROM $table WHERE thoigian in (SELECT max(thoigian) FROM $table WHERE tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and mathe = '$mathe' and congdoan = '$congdoan')";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getAVGHieuSuat($table)
         {
            $sql = "SELECT mathe2,AVG(phantram) as phantram FROM $table GROUP BY mathe2";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
         public function getDataNgayDuKien($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien)
         {
            $sql = "SELECT max(ngaydukien1) as ngaydukien1 FROM $table WHERE mathe = '$mathe' and nguoithuchien = '$nguoithuchien' and tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }

         //////////////////////////////////////////
         public function getDataTrongNgay($table,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$today,$bophan)
         {
            $sql = "SELECT giotrongngay FROM $table WHERE thoigian in (SELECT max(thoigian) FROM $table WHERE thoigian LIKE '%$today%' AND nhomthuchien = '$nhomthuchien' and tenmay = '$tenmay' and tenmay1 = '$tenmay1' and ngaybatdau = '$ngaybatdau' and ngaybatdau1 = '$ngaybatdau1' and ngaydukien = '$ngaydukien' and ngaydukien1 = '$ngaydukien1' and mathe = '$mathe' and mathe1 = '$mathe1' and bophan = '$bophan')";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataTrongNgay2($table,$today,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien)
         {
            $sql = "SELECT giotrongngay FROM $table WHERE thoigian LIKE '%$today%' and giotrongngay > '0' and giotrongngay > '0' and mathe = '$mathe' AND nguoithuchien = '$nguoithuchien' and tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' ORDER by thoigian DESC";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataTanCa($table,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$today,$bophan)
         {
            $sql = "SELECT giotrongngay FROM $table WHERE thoigian in (SELECT max(thoigian) FROM $table WHERE thoigian LIKE '%$today%' AND nhomthuchien = '$nhomthuchien' and nhomthuchien1 = '$nhomthuchien1' and tenmay = '$tenmay' and tenmay1 = '$tenmay1' and ngaybatdau = '$ngaybatdau' and ngaybatdau1 = '$ngaybatdau1' and ngaydukien = '$ngaydukien' and ngaydukien1 = '$ngaydukien1' and mathe = '$mathe' and mathe1 = '$mathe1' and bophan = '$bophan')";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataTanCa1($table,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$today,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE thoigian in (SELECT max(thoigian) FROM $table WHERE thoigian LIKE '%$today%' AND nhomthuchien = '$nhomthuchien' and nhomthuchien1 = '$nhomthuchien1' and tenmay = '$tenmay' and tenmay1 = '$tenmay1' and ngaybatdau = '$ngaybatdau' and ngaybatdau1 = '$ngaybatdau1' and ngaydukien = '$ngaydukien' and ngaydukien1 = '$ngaydukien1' and mathe = '$mathe' and mathe1 = '$mathe1' and bophan = '$bophan')";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataTimeHoanThanh($table,$mathe,$nguoithuchien,$tenmay,$ngaybatdau,$ngaydukien)
         {
            $sql = "SELECT max(hoanthanh) as hoanthanh FROM $table WHERE mathe = '$mathe' and nguoithuchien = '$nguoithuchien' and tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
         public function getDataLineMayMoc($table,$tenmay,$tenline,$bophan,$ngaybatdau,$ngaydukien,$nhomthuchien,$mathe)
         {
            $sql = "SELECT * FROM $table WHERE tenline = '$tenline' and bophan = '$bophan' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and mathe = '$mathe' and nhomthuchien = '$nhomthuchien'";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
         public function getDataLineMayMoc1($table,$tenline,$bophan,$ngaybatdau,$ngaydukien,$nhomthuchien,$mathe)
         {
            $sql = "SELECT * FROM $table WHERE tenline = '$tenline' and bophan = '$bophan' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and mathe = '$mathe' and nhomthuchien = '$nhomthuchien'";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
          public function getDataBoPhanLine($table,$tenline,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE tenline = '$tenline' and bophan = '$bophan'";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
         public function getDataBoPhanLine1($table,$tenmay,$bophan,$ngaybatdau,$ngaydukien,$mathe,$nhomthuchien)
         {
            $sql = "SELECT * FROM $table WHERE tenmay = '$tenmay' and bophan = '$bophan' and ngaybatdau = '$ngaybatdau' and ngaydukien = ' $ngaydukien' and mathe = '$mathe' and nhomthuchien = '$nhomthuchien'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $data = mysqli_fetch_array($this->result);
            }
            else{
               $data= 0;
            }
            return $data;
         }
          public function getAllDatabophan($table,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE bophan = '$bophan'";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
         public function getAllCongDoan($table,$tenmay,$ngaybatdau,$ngaydukien,$mathe,$bophan,$nhomthuchien)
         {
            $sql = "SELECT * FROM $table WHERE tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and mathe = '$mathe' and nhomthuchien = '$nhomthuchien' and bophan = '$bophan'";
             $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }

         public function num_row()
         {
            if($this->result)
            {
               $num = mysqli_num_rows($this->result);
            }
            else{
               $num =0;
            }
            return $num;
         }
         public function Insert($line)
         {
            $sql = "SELECT * from anh where em = '$line'";
             return $this->execute($sql);
         }
         //---------
         public function InsertTimeHoanThanh($table,$tenmay,$ngaybatdau,$ngaydukien,$hoanthanh,$mathe)
         {
            $sql = "INSERT INTO $table(tenmay,ngaybatdau,ngaydukien,hoanthanh,mathe) VALUES('$tenmay','$ngaybatdau','$ngaydukien','$hoanthanh','$mathe')";
             return $this->execute($sql);
         }
         public function InsertTrongNgay($table,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$hoanthanh,$phantram,$tangca,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan,$thoigian,$user,$giotrongngay)
         {
            $sql = "INSERT INTO $table(tenmay,tenmay1,ngaybatdau,ngaybatdau1,ngaydukien,ngaydukien1,tonggio,hoanthanh,phantram,tangca,mathe,mathe1,nhomthuchien,nhomthuchien1,bophan,thoigian,user,giotrongngay) VALUES('$tenmay','$tenmay1','$ngaybatdau','$ngaybatdau1','$ngaydukien','$ngaydukien1','$tonggio','$hoanthanh','$phantram','$tangca','$mathe','$mathe1','$nhomthuchien','$nhomthuchien1','$bophan','$thoigian','$user','$giotrongngay')";
             return $this->execute($sql);
         }
         public function InsertCongDoan($table,$tenmay,$tenmay1,$tiendo,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$hoanthanh,$phantram,$tangca,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$thoigian,$bophan)
         {
            $sql = "INSERT INTO $table(tenmay,tenmay1,tiendo,ngaybatdau,ngaybatdau1,ngaydukien,ngaydukien1,tonggio,hoanthanh,phantram,tangca,mathe,mathe1,nhomthuchien,nhomthuchien1,thoigian,bophan) VALUES('$tenmay','$tenmay1','$tiendo','$ngaybatdau','$ngaybatdau1','$ngaydukien','$ngaydukien1','$tonggio','$hoanthanh','$phantram','$tangca','$mathe','$mathe1','$nhomthuchien','$nhomthuchien1','$thoigian','$bophan')";
             return $this->execute($sql);
         }
          public function InsertCongDoanLine($table,$tenmay,$tenmay1,$tiendo,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$tonggio,$hoanthanh,$phantram,$tangca,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$thoigian,$bophan,$tenline)
         {
            $sql = "INSERT INTO $table(tenmay,tenmay1,tiendo,ngaybatdau,ngaybatdau1,ngaydukien,ngaydukien1,tonggio,hoanthanh,phantram,tangca,mathe,mathe1,nhomthuchien,nhomthuchien1,thoigian,bophan,tenline) VALUES('$tenmay','$tenmay1','$tiendo','$ngaybatdau','$ngaybatdau1','$ngaydukien','$ngaydukien1','$tonggio','$hoanthanh','$phantram','$tangca','$mathe','$mathe1','$nhomthuchien','$nhomthuchien1','$thoigian','$bophan','$tenline')";
             return $this->execute($sql);
         }
         public function InsertHieuSuat($table,$mathe,$hieusuat,$tenmay,$ngaybatdau)
         {
            $sql = "INSERT INTO $table(mathe,hieusuat,tenmay,ngaybatdau) VALUES('$mathe','$hieusuat','$tenmay','$ngaybatdau')";
             return $this->execute($sql);
         }
         public function InsertHieuSuat1($table,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$phantram,$mathe,$mathe1,$mathe2,$nhomthuchien,$nhomthuchien1,$bophan)
         {
            $sql = "INSERT INTO $table(tenmay,tenmay1,ngaybatdau,ngaybatdau1,ngaydukien,ngaydukien1,phantram,mathe,mathe1,mathe2,nhomthuchien,nhomthuchien1,bophan) VALUES('$tenmay','$tenmay1','$ngaybatdau','$ngaybatdau1','$ngaydukien','$ngaydukien1','$phantram','$mathe','$mathe1','$mathe2','$nhomthuchien','$nhomthuchien1','$bophan')";
             return $this->execute($sql);
         }
         public function InsertTienDoMayMocLine($tenmay,$tiendo,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$bophan,$nhomthuchien,$nhomthuchien1,$line,$mathe,$mathe1)
         {
            $sql = "INSERT INTO tiendomaymoc1(tenmay,tiendo,ngaybatdau,ngaybatdau1,ngaydukien,ngaydukien1,bophan,nhomthuchien,nhomthuchien1,tenline,mathe,mathe1) VALUES('$tenmay','$tiendo','$ngaybatdau','$ngaybatdau1','$ngaydukien','$ngaydukien1','$bophan','$nhomthuchien','$nhomthuchien1','$line','$mathe','$mathe1')";
             return $this->execute($sql);
         }
      	public function InsertData($tenmay,$tiendo,$ngaybatdau,$ngaydukien,$bophan,$nhomthuchien,$mathe)
      	{
      		$sql = "INSERT INTO tiendomaymoc(tenmay,tiendo,ngaybatdau,ngaydukien,bophan,nhomthuchien,mathe) VALUES('$tenmay','$tiendo','$ngaybatdau','$ngaydukien','$bophan','$nhomthuchien','$mathe')";
             return $this->execute($sql);
      	}
         // public function InsertData1($tenmay,$ngaybatdau,$dfm,$dtod,$giacongvadathang,$lapdatvachinhmay,$buyoff)
         // {
         //    $sql = "INSERT INTO tiendo(tenmay,ngaybatdau,dfm,3dto2d,giacongvadathang,lapdatvachinhmay,buyoff) VALUES('$tenmay','$ngaybatdau','$dfm','$dtod','$giacongvadathang','$lapdatvachinhmay','$buyoff')";
         //     return $this->execute($sql);
         // }
         public function InsertDataLine($tenmay,$ngaybatdau,$dfm,$dtod,$giacongvadathang,$lapdatvachinhmay,$buyoff,$tenline)
         {
            $sql = "INSERT INTO tiendo1(tenmay,ngaybatdau,dfm,3dto2d,giacongvadathang,lapdatvachinhmay,buyoff,tenline) VALUES('$tenmay','$ngaybatdau','$dfm','$dtod','$giacongvadathang','$lapdatvachinhmay','$buyoff','$tenline')";
             return $this->execute($sql);
         }
         public function Insertuser($table,$username,$password)
         {
            $sql = "INSERT INTO $table(username,password) VALUES('$username','$password')";
             return $this->execute($sql);
         }
      	public function UpdateData($id,$tenmay,$ngaybatdau,$ngaydukien,$bophan,$nhomthuchien)
      	{
      		$sql = "UPDATE tiendomaymoc SET tenmay='$tenmay',ngaybatdau='$ngaybatdau',ngaydukien='$ngaydukien',bophan='$bophan',nhomthuchien='$nhomthuchien' WHERE id = '$id'";
             return $this->execute($sql);
      	}
         public function Updatetenmay1($id,$tenmay,$ngaybatdau)
         {
            $sql = "UPDATE tiendoline SET tenmay='$tenmay',ngaybatdau='$ngaybatdau' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function Updatemay1($id,$tenmay,$ngaybatdau)
         {
            $sql = "UPDATE tiendo SET tenmay='$tenmay',ngaybatdau='$ngaybatdau' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdateTienDo($id,$tiendo)
         {
            $sql = "UPDATE tiendomaymoc SET tiendo='$tiendo' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdateCongDoan($table,$id,$tenmay1,$ngaybatdau1,$ngaydukien1,$mathe1,$nhomthuchien1,$thoigian)
         {
            $sql = "UPDATE $table SET tenmay1 = '$tenmay1' , ngaybatdau1 = '$ngaybatdau1' , ngaydukien1 = '$ngaydukien1' , mathe1 = '$mathe1' , nhomthuchien1 = '$nhomthuchien1' , thoigian = '$thoigian' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdateLine($table,$id,$tenmay1,$ngaybatdau1,$ngaydukien1,$mathe1,$nhomthuchien1)
         {
            $sql = "UPDATE $table SET tenmay = '$tenmay1' , ngaybatdau1 = '$ngaybatdau1' , ngaydukien1 = '$ngaydukien1' , mathe1 = '$mathe1' , nhomthuchien1 = '$nhomthuchien1' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdateTienDo1($tenmay,$tenline,$tiendo,$bophan,$ngaybatdau,$ngaydukien)
         {
            $sql = "UPDATE tiendomaymoc1 SET tiendo='$tiendo' WHERE tenline = '$tenline' and tenmay = '$tenmay' and bophan = '$bophan' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien'";
             return $this->execute($sql);
         }
        public function UpdateTienDo2($tenmay,$bophan,$tiendo)
         {
            $sql = "UPDATE tiendomaymoc SET tiendo='$tiendo' WHERE bophan = '$bophan' and tenmay = '$tenmay'";
             return $this->execute($sql);
         }
         public function UpdateCheck($table,$tangca,$id)
         {
            $sql = "UPDATE $table SET tangca ='$tangca' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdateTienDo3($tenmay,$tenline,$bophan,$tiendo,$ngaybatdau,$ngaydukien,$mathe,$nhomthuchien)
         {
            $sql = "UPDATE tiendomaymoc1 SET tiendo='$tiendo' WHERE bophan = '$bophan' and tenmay = '$tenmay' and tenline = '$tenline' and ngaybatdau = '$ngaybatdau' and ngaydukien = '$ngaydukien' and mathe = '$mathe' and nhomthuchien = '$nhomthuchien'";
             return $this->execute($sql);
         }
         public function Updateuser($table,$id,$username,$password)
         {
            $sql = "UPDATE $table SET username='$username',password='$password' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function Update($tenmay,$tenline,$ngaybatdau)
         {
            $sql = "UPDATE tiendo1 SET $tenmay ='$tenmay' WHERE tenline = '$tenline' and ngaybatdau = '$ngaybatdau'";
             return $this->execute($sql);
         }
         public function Updattiendo1($table,$tentiendo,$tiendo,$tenmay,$ngaybatdau,$tenline)
         {
            $sql = "UPDATE $table SET $tentiendo ='$tiendo' WHERE tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau' and tenline = '$tenline'";
             return $this->execute($sql);
         }
         public function UpdateTienDoCongDoan($table,$tiendo,$id)
         {
            $sql = "UPDATE $table SET tiendo ='$tiendo' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function Updatebophan($table,$bophan,$tenmay,$ngaybatdau)
         {
            $sql = "UPDATE $table SET bophan ='$bophan' WHERE tenmay = '$tenmay' and ngaybatdau = '$ngaybatdau'";
             return $this->execute($sql);
         }
         public function Updatehoanthanh($table,$ngayhoanthanh,$id)
         {
            $sql = "UPDATE $table SET ngayhoanthanh ='$ngayhoanthanh' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdateHieuSuatPhanTram($table,$phantram,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan)
         {
            $sql = "UPDATE $table SET phantram ='$phantram' WHERE tenmay = '$tenmay' and tenmay1 = '$tenmay1' and ngaybatdau = '$ngaybatdau' and ngaybatdau1 = '$ngaybatdau1' and ngaydukien = '$ngaydukien' and ngaydukien1 = '$ngaydukien1' and mathe = '$mathe' and mathe1 = '$mathe1' and nhomthuchien = '$nhomthuchien' and nhomthuchien1 = '$nhomthuchien1' and bophan = '$bophan'";
             return $this->execute($sql);
         }
         public function Updatehoanthanh1($table,$hoanthanh,$tenmay,$tenmay1,$ngaybatdau,$ngaybatdau1,$ngaydukien,$ngaydukien1,$mathe,$mathe1,$nhomthuchien,$nhomthuchien1,$bophan)
         {
            $sql = "UPDATE $table SET hoanthanh ='$hoanthanh' WHERE tenmay = '$tenmay' and tenmay1 = '$tenmay1' and ngaybatdau = '$ngaybatdau' and ngaybatdau1 = '$ngaybatdau1' and ngaydukien = '$ngaydukien' and ngaydukien1 = '$ngaydukien1' and mathe = '$mathe' and mathe1 = '$mathe1' and nhomthuchien = '$nhomthuchien' and nhomthuchien1 = '$nhomthuchien1' and bophan = '$bophan'";
             return $this->execute($sql);
         }
         public function Updatehieusuat($table,$hieusuat,$id)
         {
            $sql = "UPDATE $table SET hieusuat ='$hieusuat' WHERE id = '$id'";
             return $this->execute($sql);
         }
         public function UpdatehieusuatMaThe($table,$hieusuat,$mathe)
         {
            $sql = "UPDATE $table SET hieusuat ='$hieusuat' WHERE mathe = '$mathe'";
             return $this->execute($sql);
         }
          public function Updatebophan1($bophan,$tenline)
         {
            $sql = "UPDATE tiendomaymoc1 SET bophan ='$bophan' WHERE tenline = '$tenline'";
             return $this->execute($sql);
         }
      	public function Delete($id,$table)
      	{
      		$sql = "DELETE FROM $table WHERE id = '$id'";
      		return $this->execute($sql);
      	}
         public function Deleteuser($table,$id)
         {
            $sql = "DELETE FROM $table WHERE id = '$id'";
            return $this->execute($sql);
         }
         public function Search($table,$key,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE tenmay REGEXP '$key' and bophan = '$bophan' ORDER BY id DESC";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
          public function count_row($table)
         {
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
            if($this->result)
            {
               $num = mysqli_num_rows($this->result);
            }
            else{
               $num =0;
            }
            return $num;
         }
          public function count_row_bophan($table,$bophan)
         {
            $sql = "SELECT * FROM $table WHERE bophan = '$bophan'";
            $this->execute($sql);
            if($this->result)
            {
               $num = mysqli_num_rows($this->result);
            }
            else{
               $num =0;
            }
            return $num;
         }
         public function count_row_alldata($table)
         {
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
            if($this->result)
            {
               $num = mysqli_num_rows($this->result);
            }
            else{
               $num =0;
            }
            return $num;
         }
         

         public function login($table,$username,$password)
         {
            $sql ="SELECT * FROM $table WHERE username = '$username' and password = '$password'";
            $this->execute($sql);
            if($this->num_row()!=0)
            {
               $datalogin = mysqli_fetch_array($this->result);
            }
            else{
               $datalogin = 0;
            }
            return $datalogin;
         }
         public function usernamemanager($table,$perRow,$rowsPerPage)
         {
            $sql ="SELECT * FROM $table LIMIT $perRow,$rowsPerPage";
            $this->execute($sql);
            if($this->num_row()==0)
            {
               $data= 0;
            }
            else{
               while($datas = $this->getData()){
                  $data[] = $datas; 
               }
            }
            return $data;
         }
      }

?>