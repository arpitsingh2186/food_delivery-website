<?php include('partials-front/menu.php');?>

<?php
	session_start();
	
?>

    <?php 

            $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_setting WHERE id='1'"));

            $cart_min_price = $row['min_cart_value'];
            $cart_min_price_msg = $row['min_cart_msg'];
            $web_close = $row['web_close'];
            $web_close_msg = $row['web_close_msg'];

//$webCloseArr = array('No', 'Yes');

?>

<?php
        if (isset($_SESSION['removed'])) 
        {
            echo $_SESSION['removed'];
            unset($_SESSION['removed']);
        }
        
    ?>

<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Item Name</th>
                                            <th>Veg/Non-Veg</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$total = 0;
                                    		if (isset($_SESSION['cart'])) 
                                    		{
                                    			foreach ($_SESSION['cart'] as $key => $value) 
	                                    		{
	                                    			$se = $key+1;
	                                    			//print_r($value);
	                                    			$subtotal = $value['food_price']*$value['food_qty'];
	                                    			$total = $total+($value['food_price']*$value['food_qty']);
                                                    $_SESSION['total'] = $total;
	                                    			echo "
	                                    				<tr>
	                                    					<td>$se .</td>
	                                    					<td> $value[food_name]</td>
                                                            <td> $value[food_veg]</td>
	                                    					<td> ₹
																$value[food_price]</td>
	                                    					<td class='product-quantity'>
				                                                <div class='cart-plus-minus'>
				                                                    <input class='cart-plus-minus-box' type='number' name='qtybutton' min='1' value='$value[food_qty]'>
				                                                </div>
				                                            </td>

				                                            <td class='product-subtotal'>₹ $subtotal</td>
				                                            
				                                            <form action='manage_cart.php' method = 'POST'>
				                                            <td class='product-remove'>
				                                            
				                                                <button name='Remove_Item'>Remove</button>
				                                                <input type='hidden' name = 'Item_Name' value = '$value[food_name]'>
				                                            
				                                           </td>
				                                           </form>
	                                    				</tr>
	                                    			";
	                                    		}
                                    		}
                                    		
                                    	?>

                                    	
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <br><br>

                            <div class="text-center">
                                <div id=""><h3>Total Cart Value: ₹ <?php echo $total ?></h3></div>
                            	<br>
                            	<form>
                            		<div >
                            			<input type="radio" name="RadioDefault" id="radio1" checked> Cash on Delivery
                                        <h5>Don't Worry, We have all the Cashless Transaction Option at the Delivery time.</h5>
                            		</div>
                            		<br>
                            		<div class="cart-clear">

                                    <?php
                                    $is_error='';
                                    if ($cart_min_price!='') 
                                    {
                                        if ($total>=$cart_min_price) 
                                        {
                                            
                                        }else{
                                            $is_error = 'Yes';
                                        }
                                    }

                                    if ($is_error=='') 
                                    {
                                        ?>
                                        <input type="textbox" id="coupon_str" placeholder="Have a Coupon?" >
                                        <input type="button" name="submit" value="Apply Coupon" onclick="set_coupon()">
                                        <br><br>
                                        <div id="coupon_result" style="text-align: center; color: blue;"></div>

                                        <div id="coupon_box">
                                            <div>
                                            <h5>Discounted Price: ₹ <span id="coupon_price"></span></h5>
                                            
                                            </div>
                                            <br>
                                            <div>
                                                <h4>After Apply Coupon: 
                                                ₹ <span id="after_price"></span></h4>
                                            </div>
                                        </div>
                                        
                                        <br><br>
                                        <a href="<?php echo 'order'?>">Make Purchase</a>
                                        <br><br>

                                        <?php
                                        echo '<div style="text-align: center; color: red;"><h4>';
                                        echo 'If You Order Food from several Restaurents at One time, Delivery may be delayed.';
                                        echo "</h4></div>";
                                    }
                                    if ($is_error=='Yes') 
                                    {
                                        echo "<div style='text-align: center; color: blue;'><h4>$cart_min_price_msg</h4?</div>";
                                    }
                                    ?><br><br><?php
                                    if ($web_close==1) 
                                    {
                                        echo '<div style="text-align: center; color: red;"><h4>';
                                        echo 'Ordered food in closed period will cancelled automatecally.';
                                        echo "</h4></div>";
                                    }

                                    ?>
                
                            		
                            		</div>
                            	</form>
                            	
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="<?php echo SITEURL;?>">Continue Shopping</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <script>
            function set_coupon(){
                var coupon_str = jQuery('#coupon_str').val();
                //alert(coupon_str);
                if (coupon_str!='') {
                    jQuery('#coupon_result').html('');
                    jQuery.ajax({
                        url: 'set_coupon.php',
                        type: 'POST',
                        data: 'coupon_str='+coupon_str,
                        success: function(result){
                            var data=jQuery.parseJSON(result);
                            if (data.is_error=='yes') {
                                jQuery('#coupon_box').hide();
                                jQuery('#coupon_result').html(data.dd);
                                jQuery('#after_price').html(data.result);
                            }
                            if (data.is_error=='no') {
                                jQuery('#coupon_box').show();
                                jQuery('#coupon_price').html(data.dd);
                                jQuery('#after_price').html(data.result);
                            }
                        }
                    });
                }
            }
        </script>



<?php 

if (isset($_SESSION['COUPON_ID'])) 
        {
            unset($_SESSION['COUPON_ID']);
            unset($_SESSION['COUPON_CODE']);
            unset($_SESSION['COUPON_VALUE']);
        }

include('partials-front/footer.php');?>

<!--if($total>100){header('location:'.SITEURL.'order.php');} else{header('location:'.SITEURL.'cart-page.php');}-->