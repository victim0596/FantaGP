<?php 

  include 'connection.php';

  //$link=mysql_connect($host, $dbusername, $dbpassword); per php 5
  //mysql_select_db($dbname,$link); per php 5
  
 /* CLASSIFICA GENERALE */
    $sql="SELECT id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 1";
    $result=$conn->query($sql);
    $data1 = $result->fetch_assoc();
    
    $sql2="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 1,1";
    $result2=$conn->query($sql2);
    $data2 = $result2->fetch_assoc();

    $sql3="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 2,2";
    $result3=$conn->query($sql3);
    $data3 = $result3->fetch_assoc();

    $sql4="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 3,3";
    $result4=$conn->query($sql4);
    $data4 = $result4->fetch_assoc();

    $sql5="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 4,4";
    $result5=$conn->query($sql5);
    $data5 = $result5->fetch_assoc();

    $sql6="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 5,5";
    $result6=$conn->query($sql6);
    $data6 = $result6->fetch_assoc();

    $sql7="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 6,6";
    $result7=$conn->query($sql7);
    $data7 = $result7->fetch_assoc();

    $sql8="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 7,7";
    $result8=$conn->query($sql8);
    $data8 = $result8->fetch_assoc();

    $sql9="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 8,8";
    $result9=$conn->query($sql9);
    $data9 = $result9->fetch_assoc();

    $sql10="Select id_p, sum(punti) from pronostici GROUP BY id_p order by sum(punti) desc limit 9,9";
    $result10=$conn->query($sql10);
    $data10 = $result10->fetch_assoc();

  /* CLASSIFICA PAGELLE */
    $sql11="SELECT id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 1";
    $result11=$conn->query($sql11);
    $data11 = $result11->fetch_assoc();
    
    $sql12="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 1,1";
    $result12=$conn->query($sql12);
    $data12 = $result12->fetch_assoc();

    $sql13="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 2,2";
    $result13=$conn->query($sql13);
    $data13 = $result13->fetch_assoc();

    $sql14="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 3,3";
    $result14=$conn->query($sql14);
    $data14 = $result14->fetch_assoc();

    $sql15="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 4,4";
    $result15=$conn->query($sql15);
    $data15 = $result15->fetch_assoc();

    $sql16="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 5,5";
    $result16=$conn->query($sql16);
    $data16 = $result16->fetch_assoc();

    $sql17="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 6,6";
    $result17=$conn->query($sql17);
    $data17 = $result17->fetch_assoc();

    $sql18="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 7,7";
    $result18=$conn->query($sql18);
    $data18 = $result18->fetch_assoc();

    $sql19="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 8,8";
    $result19=$conn->query($sql19);
    $data19 = $result19->fetch_assoc();

    $sql20="Select id_p, sum(punti_pag) from pronostici GROUP BY id_p order by sum(punti_pag) desc limit 9,9";
    $result20=$conn->query($sql20);
    $data20 = $result20->fetch_assoc();

  /* CLASSIFICA PRONOSTICI */  
    $sql21="SELECT id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 1";
    $result21=$conn->query($sql21);
    $data21 = $result21->fetch_assoc();
    
    $sql22="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 1,1";
    $result22=$conn->query($sql22);
    $data22 = $result22->fetch_assoc();

    $sql23="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 2,2";
    $result23=$conn->query($sql23);
    $data23 = $result23->fetch_assoc();

    $sql24="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 3,3";
    $result24=$conn->query($sql24);
    $data24 = $result24->fetch_assoc();

    $sql25="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 4,4";
    $result25=$conn->query($sql25);
    $data25 = $result25->fetch_assoc();

    $sql26="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 5,5";
    $result26=$conn->query($sql26);
    $data26 = $result26->fetch_assoc();

    $sql27="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 6,6";
    $result27=$conn->query($sql27);
    $data27 = $result27->fetch_assoc();

    $sql28="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 7,7";
    $result28=$conn->query($sql28);
    $data28 = $result28->fetch_assoc();

    $sql29="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 8,8";
    $result29=$conn->query($sql29);
    $data29 = $result29->fetch_assoc();

    $sql30="Select id_p, sum(punti_pron) from pronostici GROUP BY id_p order by sum(punti_pron) desc limit 9,9";
    $result30=$conn->query($sql30);
    $data30 = $result30->fetch_assoc();

  mysqli_close($conn); 

?>