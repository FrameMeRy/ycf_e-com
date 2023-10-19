
<?php 

require_once('condb.php');

            require_once __DIR__ . '/vendor/autoload.php';

            $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
            $fontDirs = $defaultConfig['fontDir'];

            $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
            $fontData = $defaultFontConfig['fontdata'];

                

            $mpdf = new \Mpdf\Mpdf([


                'fontDir' => array_merge($fontDirs, [
                    __DIR__ . '/tmp',
                ]),
                'fontdata' => $fontData + [
                    'sarabun' => [
                        'R' => 'THSarabun.ttf',
                        'I' => 'THSarabun Italic.ttf',
                        'B' => 'THSarabun Bold.ttf',
                        'BI' => 'THSarabun Bold Italic.ttf',
                    ]
                ],
                'default_font_size' => 14,
                'default_font' => 'sarabun'
                
            ]);

            ?>

<br><br><br>

        <div class="container col-12">
            <div class="card ">
                <p><h1><center>รายชื่อสมาชิกทั้งหมดในระบบ CHEECARE</center></h1></p>
                    <!-- ปริ้น -->
                        <div ALIGN ="right">
                            <a href="member.php" class="btn btn-outline-primary ml-2" >ย้อนกลับ</a>
                            <a href="รายชื่อสมาชิกทั้งหมดในระบบ CHEECARE.pdf" class="btn btn-danger">พิมพ์หน้านี้</a>
                        </div>
        <?php ob_start();?><br>
        <style>
            body {
                font-family: sarabun;
            }
            table {
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
        

                    <table class="table table-striped col-2">
                        <div class="containers">      
                            <tr>
                                <td ><center><b>ลำดับที่</b></center></td>
                                <td ><center><b>ชื่อ</b></center></td>
                                <td ><center><b>นามสกุล</b></center></td>
                                <td ><center><b>เพศ</b></center></td>
                                <td ><center><b>ว/ด/ป ที่เกิด</b></center></td>   
                                <td ><center><b>น้ำหนัก</b></center></td> 
                                <td ><center><b>ส่วนสูง</b></center></td> 
                                <td ><center><b>ยาที่แพ้</b></center></td> 
                                <td ><center><b>โรงพยาบาล</b></center></td> 
                                <td ><center><b>เบอร์โทร</b></center></td> 
                                <td ><center><b>เลขปชช.</b></center></td> 
                                <td ><center><b>คำนำหน้า(ญาติ)</b></center></td> 
                                <td ><center><b>ชื่อ(ญาติ)</b></center></td> 
                                <td ><center><b>นามสกุล(ญาติ)</b></center></td> 
                                <td ><center><b>เบอร์โทร(ญาติ)</b></center></td> 

                            </tr>
                        </div>
        
                        <?php
                            $no=1;
                            $sum=0;
                            $select_stmt = $db->prepare("SELECT * FROM tbl_admin");
                            $select_stmt->execute();

                            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <tr>
                                <td ><center><?php echo $row["a_id"]; ?></center></td>
                                <td ><center><?php echo $row["a_user"]; ?></center></td>

                            </tr>

                        <?php 
                        $sum += $select_stmt;
                        $no++;
                         } ?>

                    </table> 
                                <h3>จำนวนสมาชิกทั้งหมด  <?php echo $sum;?></h3>

                <!-- pdf   -->
                <?php
                    // หัวกระดาษ THSarabun Bold
                    $mpdf->SetHTMLHeader('
                    <div style="text-align: center; font-Sarabun: Bold;">
                        <h2><b>รายชื่อสมาชิกทั้งหมดในระบบ CHEECARE</b></h2>
                    </div>');
                    
                    // ท้ายกระดาษ
                    $mpdf->SetHTMLFooter('
                    <table width="100%">
                        <tr>
                            <td width="33%">วันที่ออกเอกสาร {DATE j-m-Y}</td>
                            <td width="33%" align="center">หน้าที่ {PAGENO}/{nbpg}</td>
                            <td width="33%" style="text-align: right;">ลงชื่อ.......................................................ผู้ขอเอกสาร</td>
                        </tr>
                    </table>');
                    // ตั้งค่าเอกสาร
                    $html = ob_get_contents();
                    $mpdf->AddPage('L');
                    $mpdf->WriteHTML($html);
                    $mpdf->Output("รายชื่อสมาชิกทั้งหมดในระบบ CHEECARE.pdf");
                    ob_end_flush();
                ?>
                    </div></div>

                        </div>
<br><br><br>
<?php require("Template/footer.php");?>
