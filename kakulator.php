<!--Agung Rahayu & M.Zakie XI RPL 1-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>PROGRAM KALKULATOR</title>
    <style>
    body{
        background:url('a.png');
        background-size:cover;
        background-position:50%;
    }
    .calc {
        margin-top: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card {
        width: 19rem;
        margin-left: 75vh;
        box-shadow: 0 10px 15px rgb(104, 104, 104);
        max-width: 400px; 
        margin: 0 auto; 
        animation: floatImage 15s ease-in-out infinite;
    }
        @keyframes floatImage {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-2.4rem);
    }

    100% {
        transform: translateY(0);
    }
    }


   
    .inpt{
        width: 16em;
    }
    .butn{
        width: 63px;
        margin-left: 1px;
        margin-top: 6px;
        margin-bottom: 2px;
        
    }
    .butn-clear{
        width: 255px;
        margin-left: 1px;
        margin-top: 4px;
        margin-bottom: 2px;
        
    }



    @media (min-width: 768px) {
        .calc {
            margin-top: 350px;
        }

        .card {
            width: 19rem; 
        }
          body {
        background-size: cover;
        }
    }



    </style>
  </head>
  <body>
        <?php
        $bilangan1 = [1,2,3,'+', 4,5,6,'-', 7,8,9,'*',0,'.','/','='];
        $bilanganHapus = ['C'];
        $tombol='';
        if(isset($_POST['tombol']) && in_array($_POST['tombol'],$bilangan1)){
            $tombol=$_POST['tombol'];
        }
        $hitungan='';
        if(isset($_POST['hitungan']) && preg_match('~^(?:[\d.]+[* /+-]?)+$~',$_POST['hitungan'],$keluar)){
            $hitungan=$keluar[0];    
        }
        $tampilan=$hitungan.$tombol;
        
        if($tombol=='C'){
            $tampilan='';
        }elseif($tombol=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$hitungan)){
            $tampilan.=eval("return $hitungan;");
        }
        echo "<div class='calc'>";
            echo "<form method='POST'>";
                echo "<div class='card' 'animated slideInRight'>";
                    echo "<div class='card-body'>";
                        echo "<input class='form-control inpt' type='text' name='hitungan' value='$tampilan' placeholder='0'";
                        echo "<div class='card-number'>";
                        
                            foreach(array_chunk($bilangan1,4) as $chunk){
                                
                                foreach($chunk as $button){
                                    echo "<button ",(sizeof($chunk)!=4?" ":"")," name='tombol' value='$button' class='btn btn-info butn'>$button</button>";
                                }
                                
                            }
                                
                            foreach($bilanganHapus as $hapus){
                                echo "<button name='tombol' value='$hapus' class='btn btn-info butn-clear'>$hapus</button>";
                            }
                        
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</form>";
        echo "</div>"
        ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>