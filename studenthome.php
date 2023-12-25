<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css\home.css" rel="stylesheet">
    <link href="css\base.css" rel="stylesheet">
</head>
<body>
<div class="welcome-message">
        <?php 
    session_start();
    if(isset($_SESSION['userID'])){
       echo "Chào mừng học sinh đã đăng nhập với tài khoản ". $_SESSION['userID']. "<br/>";
    }
    else{
       echo "Bạn chưa đăng nhập !";
       echo '<a href="dangnhap.php">Đăng nhập</a>';
     }
    ?>
        </div> 
    <div class="container">
        <nav>
            <ul>
                
                </a></li>
                <li><a href="search_diem.php" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg>
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Tra cứu điểm </span>

                </a></li>
                
                <li><a href="dangnhap.php" class="logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                      </svg>
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Thoát</span>
                </a></li>

            </ul>
            
        </nav>
        <div class="header-background">
        <img src="https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-e-commerce-book-knowledge-teacher-education-banner-background-image_186718.jpg" alt="">
        </div> 
    </div>
    
    

</body>
</html>