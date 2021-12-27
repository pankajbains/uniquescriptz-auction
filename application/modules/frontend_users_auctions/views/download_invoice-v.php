<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    /* min-width: 400px; */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table2{
    border:2px solid; 
    height:75px;
    width:320px;
    float:right;
    margin-top: 120px;
    
}
.styled-table thead tr {
    background-color: #cda557;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table2 th,
.styled-table2 td {
    padding: 12px 15px;
    text-align: center;
} 

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}
.styled-table2 tr th{
    background-color:#cda557;
    padding: 12px 15px;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
#address{
    display:flex;
    padding: 12px 15px;
}
</style>
<div class="header-logo">
    <!-- <p style="text-align:center; font-size: 35px; font-weight:bold;">Payment Invoice</span></p> -->
    <!-- <img src="<?php echo base_url();?>assets/frontendfiles/images/uniquescriptz-logo2.png"> -->
    <!-- <img src="https://cdn.logo.com/hotlink-ok/logo-social.png" alt="logo"> -->
    <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents(@<?php echo base_url();?>assets/frontendfiles/images/uniquescriptz-logo2.png))}}" alt="image" >
</div>
<div id="header1" style="display:flex; height:10px">
    <p style="text-align:left;"><strong>Invoice: <?php echo $content_auction[0]['auction_id'];?></strong></p>
    <p style="text-align:right;"><strong>Status: Pending</strong></p>
    <!-- <p><?php echo base_url(); ?></p> -->
</div>
<hr>
<div id="address" style="height:220px;">
    <div>
<p style="text-align:right;"><strong>From:</strong></p>
<p style="text-align:right;"><strong><?php echo $site_setting[0]['site_name'];?></strong></p>
<p style="text-align:right;"><?php echo $site_setting[0]['site_address'];?></p>
<p style="text-align:right;">Email: <?php echo $email_setting[0]['email_support'];?></p>
<p style="text-align:right;">Phone: <?php echo $site_setting[0]['site_phone'];?></p>
</div>
    <div>
<p style="text-align:left;"><strong>To:</strong></p>
<p style="text-align:left;"><strong><?php  echo strtoupper($username);?></strong></p>
<p style="text-align:left;"><?php echo $user_address[0]['address'];?></p>
<p style="text-align:left;"><?php echo $user_address[0]['city'];?></p>
<p style="text-align:left;">Email: <?php echo $this->common->encrypt_decrypt('decrypt',$user_data[0]['email']);?></p>
<p style="text-align:left;">Phone: <?php echo $user_data[0]['mobile'];?></p>   
    </div>
</div>
<hr>
    <table class="styled-table" style="border:2px solid; height:75px;width:705px;float:center;">
    <thead>
        <tr style="text-align:center;">
            <th>SNo.</th>
            <th>Item</th>
            <th>Description</th>
            <th>Unit Cost</th>
            <th>Bid Price</th>
        </tr>
    </thead>
    <tbody>
        <tr style="text-align:center;">
            <td>1</td>
            <td><?php echo $content_auction[0]['auction_name'];?></td>
            <td><?php echo $content_auction[0]['auction_desc'];?></td>
            <td><?php echo $content_auction[0]['auction_nprice'];?></td>
            <td>$<?php echo $content_auction[0]['bid_price'];?></td>
        </tr>
    </tbody>
    </table>
    <table class="styled-table2">
    <tbody>
            <tr>
                <th>Subtotal</th>
                <td>$<?php echo $content_auction[0]['bid_price'];?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td>$<?php echo $content_auction[0]['bid_price'];?></td>
            </tr>
        </tbody>
    </table>
    