<?php include('layouts/header.php'); ?>

<?php




if (isset($_POST['order_pay_btn']) ){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}

?>







      <!--Payment-->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">

        <!-- <p><?php if (isset($_GET['order_status'])){echo $_GET['order_status'];}?></p> -->

           



        <?php if (isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
                   <?php $amount = strval($_POST['order_total_price']); ?>
                   <?php $order_id = $_POST['order_id']; ?>
                    <p>Total payment: $<?php echo $_POST['order_total_price']; ?></p>
                    <!-- <input class="btn btn-primary" type="submit" value="Pay Now"/> -->
                       <!-- Set up a container element for the button -->
                       <div id="paypal-button-container center"></div>
            



           <?php } else if(isset($_SESSION['total'])  && $_SESSION['total'] != 0){?>
               <?php $amount = strval($_SESSION['total']); ?>
               <?php $order_id = $_SESSION['order_id']; ?>
                <p>Total payment: $<?php echo $_SESSION['total']; ?>  </p>

                <!-- <input class="btn btn-primary" type="submit" value="Pay Now"/> -->
                   <!-- Set up a container element for the button -->
                   <div id="paypal-button-container center"></div>
            
        
            
           <?php } else {  ?>
                     <p>You don't have an order</p>            
           <?php } ?>
                
               


        
           
            
        </div>
    </section>

     <!-- Replace "test" with your own sandbox Business account app client ID -->
     <script src="https://www.paypal.com/sdk/js?client-id=AZ7PfeHdbaasZMWmpQ45V1l1PjZgn_QCmRq1UB7-zJH9sKQbd_WIeGuptm6RMzSlpNxq5tx6gBtHwf9v&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container center"></div>
    <!-- <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
          return fetch("/api/orders", {
            method: "post",
            // use the "body" param to optionally pass additional order information
            // like product ids or amount
          })
          .then((response) => response.json())
          .then((order) => order.id);
        },
        // Finalize the transaction on the server after payer approval
        onApprove: (data, actions) => {
          return fetch(`/api/orders/${data.orderID}/capture`, {
            method: "post",
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
    -->







 



    <?php include('layouts/footer.php'); ?> 