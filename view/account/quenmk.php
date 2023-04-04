<div class="row mb">
            <div class="boxtrai mr ">
              <div class="row mb">
                
                <div class="boxtitle"> Quên Mật Khẩu</div>
                  <div class="row boxcontent formtaikhoan">
                        <form action="index.php?act=quenmk" method="post"  >
                          <div class="row mb10">  Email<input type="email" name="email" required></div>
                          <div class="row mb10">  <input type="submit" name="guiemail" value="Gửi">
                            <input type="reset" value="nhập lại"></div>
                        </form>
                        <h2 class="thongbao">
                        <?php 
                       
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                        ?>
                        </h2>
                   </div>
              </div>
              
             
                      </div>
           <div class="boxphai">
           <?php
            include "view/boxphai.php";
            ?>
           </div>
    </div>
