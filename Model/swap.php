<?php
function high_low($product,$temp1){
    for($i=0;$i<count($product);$i++){
        if($temp1==$product[$i]->cat)
        {
            for($j=$i;$j<count($product);$j++)
            {
                if($product[$i]->price<$product[$j]->price)
                {
                    if($temp1==$product[$j]->cat)
                    {
                        $temp=$product[$i]->price;
                        $hinh=$product[$i]->image;
                        $ten=$product[$i]->title;
                        $product[$i]->price=$product[$j]->price;
                        $product[$i]->title=$product[$j]->title;
                        $product[$i]->image=$product[$j]->image;
                        $product[$j]->price=$temp;
                        $product[$j]->title=$ten;
                        $product[$j]->image=$hinh;
                    }
                }
            }
            include "product.php";
        }
    }
}
function low_high($product,$temp2){
    for($i=0;$i<count($product);$i++){
        if($temp2==$product[$i]->cat)
        {
            for($j=$i+1;$j<count($product);$j++)
            {
                if($product[$i]->price>$product[$j]->price)
                {
                    if($temp2==$product[$j]->cat)
                    {
                        $temp=$product[$i]->price;
                        $hinh=$product[$i]->image;
                        $ten=$product[$i]->title;
                        $product[$i]->price=$product[$j]->price;
                        $product[$i]->title=$product[$j]->title;
                        $product[$i]->image=$product[$j]->image;
                        $product[$j]->price=$temp;
                        $product[$j]->title=$ten;
                        $product[$j]->image=$hinh;
                    }
                }
            }
            include "product.php";
        }
    }
}
function high_low1($product,$temp1){
    for($i=0;$i<count($product);$i++){
        if($temp1==$product[$i]->brand)
        {
            for($j=$i;$j<count($product);$j++)
            {
                if($product[$i]->price<$product[$j]->price)
                {
                    if($temp1==$product[$j]->brand)
                    {
                        $temp=$product[$i]->price;
                        $hinh=$product[$i]->image;
                        $ten=$product[$i]->title;
                        $product[$i]->price=$product[$j]->price;
                        $product[$i]->title=$product[$j]->title;
                        $product[$i]->image=$product[$j]->image;
                        $product[$j]->price=$temp;
                        $product[$j]->title=$ten;
                        $product[$j]->image=$hinh;
                    }
                }
            }
            include "product.php";
        }
    }
}
function low_high1($product,$temp2){
    for($i=0;$i<count($product);$i++){
        if($temp2==$product[$i]->brand)
        {
            for($j=$i+1;$j<count($product);$j++)
            {
                if($product[$i]->price>$product[$j]->price)
                {
                    if($temp2==$product[$j]->brand)
                    {
                        $temp=$product[$i]->price;
                        $hinh=$product[$i]->image;
                        $ten=$product[$i]->title;
                        $product[$i]->price=$product[$j]->price;
                        $product[$i]->title=$product[$j]->title;
                        $product[$i]->image=$product[$j]->image;
                        $product[$j]->price=$temp;
                        $product[$j]->title=$ten;
                        $product[$j]->image=$hinh;
                    }
                }
            }
            include "product.php";
        }
    }
}
function temp1($product){
    for($i=0;$i<count($product);$i++){
        for($j=$i+1;$j<count($product);$j++)
            {
                if($product[$i]->price<$product[$j]->price)
                {
                  
                        $temp=$product[$i]->price;
                        $hinh=$product[$i]->image;
                        $ten=$product[$i]->title;
                        $product[$i]->price=$product[$j]->price;
                        $product[$i]->title=$product[$j]->title;
                        $product[$i]->image=$product[$j]->image;
                        $product[$j]->price=$temp;
                        $product[$j]->title=$ten;
                        $product[$j]->image=$hinh;
                }
            }
        include "product.php";
    }
}
function temp2($product){
    for($i=0;$i<count($product);$i++){
        for($j=$i+1;$j<count($product);$j++)
            {
                if($product[$i]->price>$product[$j]->price)
                {
                  
                        $temp=$product[$i]->price;
                        $hinh=$product[$i]->image;
                        $ten=$product[$i]->title;
                        $product[$i]->price=$product[$j]->price;
                        $product[$i]->title=$product[$j]->title;
                        $product[$i]->image=$product[$j]->image;
                        $product[$j]->price=$temp;
                        $product[$j]->title=$ten;
                        $product[$j]->image=$hinh;
                }
            }
        include "product.php";
    }
}
function xuat($product){
    for($i=0;$i<count($product);$i++){
        include "product.php";
    }
}
?>