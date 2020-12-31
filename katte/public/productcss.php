<?php
$result = $conn->query($sql);
if($result->num_rows>0){
    echo'<div class="khungsp">';
    while($row = $result->fetch_assoc()){
        echo'
        <div class="cotsp">
            <form action="chi-tiet-san-pham.php" method="GET">
            <a style="text-decoration: none;" onclick="parentNode.submit()">
                <img src='.$row['Hinh'].'>
                <h4>
                    '.$row['MSHH'].'
                </h4>
                <h4>
                    '.$row['TenHH'].'
                </h4>
                <h3>
                    '.$row['Gia'].'
                </h3>
                <input type="hidden" name="MSHH" value='.$row['MSHH'].' />  
            </a>
            </form> 
        </div>
        ';
    }
    echo '</div>';
    
}
else {
    echo '0 kết quả.';
}
$conn->close();
?>