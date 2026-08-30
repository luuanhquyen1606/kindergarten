<link
  href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&family=Nunito:wght@300;400;600&display=swap"
  rel="stylesheet"
/>
<?php
if(session()->has('theme_preview')){
            $theme_preview = session()->get('theme_preview');
            $theme = $theme_preview['theme'];
            $time = $theme_preview['time'];
            $valid_time = $time+3600; 
            if($valid_time < time())
            {
                session()->forget('theme_preview');

                return redirect(to: '');
            }
            date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<div class=" common-top-bar">
  <div class="row ">
    <div class="col-md-12 " style="color: white;"> 
     <?php echo $theme;?>  
     (<?php echo date('H:i', $valid_time);?>)  
    
       <a href="/stop-preview/" style="color: red;">X</a>
    </div>
  </div>
</div>

<style>
  
    .common-top-bar {
      border-radius: 8px;
    height: 40px;
   position: fixed;
  bottom: 20px;
   left:10px;
  width: 175px;
  z-index: 1000000;
  padding:5px 10px 5px 10px;
  background-color:black;
}
</style>
<?php         
}
?>