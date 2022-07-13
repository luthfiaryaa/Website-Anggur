<?php
    $host     = "localhost";
    $database = "sistempakar";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = new mysqli($host, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Get All Product Name Unique
    $sql = "SELECT distinct nama_penyakit from tbl_rating order by nama_penyakit asc";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $products[] = $row["nama_penyakit"];
        }
    }
    
    //index proposed x,y (x=id user, y = id product / product_name)
    //Inisiasi Matrix User + Product
    $array_of_users_products = [];
    $total_users = 0;
    if (count($products) > 0){
        // output data of each row
        foreach($products as $product){
            $total = 0;
            $sql = "SELECT * from users";
            $result = $conn->query($sql);
            //Num of Users = $result->num_rows
            if ($result->num_rows > 0) {
                $total_users = $result->num_rows;
                while($row = $result->fetch_assoc()) {
                    $sql_user_products = "SELECT * from tbl_rating where user_id=".$row['user_id']." AND nama_penyakit='".$product."'";
                    $result_user_products = $conn->query($sql_user_products);
                    if ($result_user_products->num_rows > 0) {
                        while($row_user_products = $result_user_products->fetch_assoc()) {
                            $array_of_users_products[$product][$row['username']] = $row_user_products['rating'];
                            $total += $row_user_products['rating'];
                        }
                    }else
                        $array_of_users_products[$product][$row['username']] = 0;
                }

                $array_of_users_products[$product]['total'] = $total;
                $array_of_users_products[$product]['average'] = $array_of_users_products[$product]['total'] / count($products);
            }
        }
    }

    echo "<h3>Pemetaan Awal</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                foreach($array_of_users_products as $key => $row){
                    foreach($row as $key1 => $datauser){
                        echo "<td>".$key1."</td>";
                    }
                    break;
                }
            echo "</tr>";
        echo "</thead>";
    foreach($array_of_users_products as $key => $row){
        echo "<tr>";
            echo "<td>".$key."</td>";
        foreach($row as $column){
            echo "<td>".$column."</td>";    
        }
        echo "<tr>";
        echo "<br/>";
    }
    echo "</table>";
    
    

    //Normalized Matrix dikurangi rata-rata
    $array_of_users_products_normalize = [];
    foreach($array_of_users_products as $user => $user_products){
        foreach($user_products as $product => $user_product){
            if ($product == "total" || $product == "average")
                continue;
            $array_of_users_products_normalize[$user][$product] = $user_product - $user_products['average'];
        }
    }
    echo "<h3>X - Average Normalisasi</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                foreach($array_of_users_products_normalize as $key => $row){
                    foreach($row as $key1 => $datauser){
                        echo "<td>".$key1."</td>";
                    }
                    break;
                }
            echo "</tr>";
        echo "</thead>";
        foreach($array_of_users_products_normalize as $key => $row){
            echo "<tr>";
                echo "<td>".$key."</td>";
            foreach($row as $column){
                echo "<td>".$column."</td>";    
            }
            echo "<tr>";
            echo "<br/>";
        }
    echo "</table>";
    
    // //Akar Kuadrat Jumlah Matrix dari normalisasi
    $array_of_users_products_square_and_square_roots = [];
    foreach($array_of_users_products_normalize as $product => $user_products){
        $sum = 0;
        foreach($user_products as $user => $user_product){
            if ($product == "total" || $product == "average")
                continue;
            $array_of_users_products_square_and_square_roots[$product][$user] = pow($array_of_users_products_normalize[$product][$user],2);
            $sum += pow($array_of_users_products_normalize[$product][$user],2);
        }
        $array_of_users_products_square_and_square_roots[$product]['sum'] = $sum;
        $array_of_users_products_square_and_square_roots[$product]['square_root'] = sqrt($sum);
    }
    
    echo "<h3>Square + Square Roots</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                foreach($array_of_users_products_square_and_square_roots as $key => $row){
                        echo "<td>".$key1."</td>";
                    }
                    break;
                }
            echo "</tr>";
        echo "</thead>";
        foreach($array_of_users_products_square_and_square_roots as $key => $row){
            echo "<tr>";
            
                echo "<td>".$key."</td>";
            foreach($row as $column){
                echo "<td>".$column."</td>";    
            }
            echo "<tr>";
            echo "<br/>";
        }
    echo "</table>";
    
    // Similarity + Absolute
    $array_of_users_products_similarity = [];
    $array_of_users_products_similarity_abs = [];
    foreach($products as $product){
        $sum = 0;
        foreach($products as $key_product => $product2){
            $similarity = 0;
            if($product == $product2){
                $similarity = 1;
            }
            
            else{
                foreach($array_of_users_products_normalize as $key => $data){
                    foreach($data as $key2 => $data2){
                        $similarity += $array_of_users_products_normalize[$product][$key2] * $array_of_users_products_normalize[$product2][$key2];
                    }
                    break;
                }
                
                $pembagi_1 = $array_of_users_products_square_and_square_roots[$product]['square_root'];
                $pembagi_2 = $array_of_users_products_square_and_square_roots[$product2]['square_root'];

                $similarity = ($similarity / ($pembagi_1 * $pembagi_2));
            }
            $array_of_users_products_similarity[$product][$product2] = $similarity;
            $array_of_users_products_similarity_abs[$product][$product2] = abs($similarity);
            $sum += abs($similarity);
        }
        $array_of_users_products_similarity_abs[$product]['sum'] = $sum;
    }
    
    echo "<h3>Similarity</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                foreach($array_of_users_products as $key => $row){
                    echo "<td>".$key."</td>";
                }
            echo "</tr>";
        echo "</thead>";
        foreach($array_of_users_products_similarity as $key => $row){
            echo "<tr>";
            
                echo "<td>".$key."</td>";
            foreach($row as $column){
                echo "<td>".$column."</td>";    
            }
            echo "<tr>";
            echo "<br/>";
        }
    echo "</table>";
    
    echo "<br/>";
    echo "<h3>Similarity ABS</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                foreach($array_of_users_products as $key => $row){
                    echo "<td>".$key."</td>";
                }
                echo "<td>Sum</td>";
            echo "</tr>";
        echo "</thead>";
        foreach($array_of_users_products_similarity_abs as $key => $row){
            echo "<tr>";
            
                echo "<td>".$key."</td>";
            foreach($row as $column){
                echo "<td>".$column."</td>";    
            }
            echo "<tr>";
            echo "<br/>";
        }
    echo "</table>";

    // //Mencari Prediksi Product X, User Y
    $array_of_prediction = [];
    $array_of_prediction_abs = [];
    $list_users = [];
    foreach($array_of_users_products as $key => $row){
        foreach($row as $key_user => $user){
            if($key_user == "total" || $key_user == "average")
                continue;
            $list_users[] = $key_user;
        }
        break;
    }
    //user
    foreach($list_users as $user){
        
        //item
        foreach($array_of_users_products as $key => $row){
            $total_abs = 0;
            $total_prediction = $row['average'];
            $total_sum = 0;
            $total_bottom = 0;
            foreach($array_of_users_products as $key_1 => $row){
                $total_sum += $array_of_users_products_normalize[$key_1][$user] * $array_of_users_products_similarity[$key][$key_1];
                $total_bottom += $array_of_users_products_similarity_abs[$key][$key_1];
            }
            
            $total_bottom = ($total_bottom == 0 ) ? 1 : $total_bottom;
            $array_of_prediction[$key][$user] = $total_prediction + ($total_sum/$total_bottom);
            $array_of_prediction_abs[$key][$user] = ($total_prediction + ($total_sum/$total_bottom));
            $total_abs += $total_prediction + ($total_sum/$total_bottom);
            
            // $array_of_prediction[$key][$user] = $total_prediction + ($total_sum/$total_bottom);
            // $array_of_prediction_abs[$key][$user] = abs($total_prediction + ($total_sum/$total_bottom));
            // //user
            // foreach($row as $key_user => $user){
            //     //rata-rata-item
            //     $total_prediction = $row['average'];
            //     $total_sum = 0;
            //     $total_bottom = 0;
            //     if($key_user == "total" || $key_user == "average")
            //         continue;
                
            //     foreach($array_of_users_products as $key_prod => $row){
            //         //user - item 
            //         $total_sum += $array_of_users_products_normalize[$key_prod][$key_user] * $array_of_users_products_similarity[$key][$key_prod];
                    
            //             print_r($array_of_users_products_normalize[$key_prod][$key_user]." ".$array_of_users_products_similarity[$key][$key_prod]);
            //             echo"<br/>";
            //             print_r($key_prod. " ".$key);
            //             echo"<br/>";
            //             echo"<br/>";
                        
                    
            //         $total_bottom += $array_of_users_products_similarity_abs[$key][$key_prod];
            //     }
            //     if ($key_user == "Abdul Aziz"){
            //         print_r($total_sum);
            //         echo"<br/>";
            //         print_r($key_user);
            //         exit(1);
            //     }
                
                
            //     $total_bottom = ($total_bottom == 0 ) ? 1 : $total_bottom;
            //     $array_of_prediction[$key][$key_user] = $total_prediction + ($total_sum/$total_bottom);
            //     $array_of_prediction_abs[$key][$key_user] = abs($total_prediction + ($total_sum/$total_bottom));
            //     $total_abs += abs($total_prediction + ($total_sum/$total_bottom));
            // }
            if (isset($array_of_prediction_abs[$key]['total']))
                $array_of_prediction_abs[$key]['total'] += $total_abs;
            else
                $array_of_prediction_abs[$key]['total'] = $total_abs;
        }
       
    }
  
    // echo "<pre>";
    // print_r($array_of_prediction_abs);
    // echo "</pre>";
    // exit(1);
    
    echo "<br/>";
    echo "<h3>Prediksi Akhir </h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                foreach($array_of_users_products as $key => $row){
                    foreach($row as $key1 => $datauser){
                        if($key1 == "total" || $key1 == "average")
                            continue;
                        echo "<td>".$key1."</td>";
                    }
                    break;
                }
                // echo "<td>Total</td>";
            echo "</tr>";
        echo "</thead>";
    foreach($array_of_prediction_abs as $key => $row){
        echo "<tr>";
        
            echo "<td>".$key."</td>";
        foreach($row as $key_column => $column){
            if($key_column == "total")
                continue;
            echo "<td>".$column."</td>";    
        }
        
        echo "</tr>";
    }
    echo "</table>";

    // //MAE
    $array_of_mae = [];
    foreach($array_of_prediction as $key => $predict){
        $abs = 0;
        foreach($predict as $data_predict => $pred){
            $abs += abs($pred-$array_of_users_products[$key][$data_predict]);
        }
        $array_of_mae[$key] = ($abs/ (count($list_users) == 0 ? 1 : count($list_users)));
    }
    
    echo "<h3>MAE</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                echo "<td>Nilai MAE</td>";
            echo "</tr>";
        echo "</thead>";
    foreach($array_of_mae as $key => $row){
        echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$row."</td>";    
        echo "</tr>";
    }
    echo "</table>";
    
    //Sort HIGH to LOW
    arsort($array_of_mae);
    echo "<br/>";
    echo "<h3>MAE DESC</h3>";
    echo "<table border=\"1\">";
        echo "<thead>";
            echo "<tr>";
                echo "<td></td>";
                echo "<td>Nilai MAE</td>";
            echo "</tr>";
        echo "</thead>";
    $average = 0;
    foreach($array_of_mae as $key => $row){
        echo "<tr>";
            echo "<td><a href='solusi.php?id=$key'>".$key."</td>";
            echo "<td>".$row."</td>";    
        echo "</tr>";
        $average += $row;
    }
    // echo "<tr>";
    //     echo "<td>Rata Rata</td>";
    //     echo "<td>".$average/count($array_of_mae)."</td>";    
    // echo "</tr>";
    echo "</table>";
    
    $conn->close();
?>