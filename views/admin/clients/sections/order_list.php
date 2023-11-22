<style>
    .ewm_dpm_client_main_table{
        Width:100%;
        padding: 20px;
    }
    .ewm_dpm_c_title{
        padding: 5px;
        border: 1px solid #cccccc75;
        background-color: #cccccc75;
    }
    .ewm_dpm_c_body{
        padding: 5px;
        border: 1px solid #cccccc75;
    }
    .ewm_dpm_c_edit{
        padding: 5px;
        border: 1px solid #cccccc75 ;
    }
    .ewm_dpm_open_order{        
        color: #fff;
        background-color: #ffba00;
        border: 0px;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
    }
    .ewm_dpm_order_title{
        padding-top: 20px;
        font-size: 18px;
    }
    .ewm_dpm_order_list_head{
        background-color:#515151;
        color: #fff;
        padding:10px;
    }
    .ewm_dpm_order_list_head > td{
        padding: 5px;
    }
</style>
<div class="ewm_dpm_order_title">
    <center>Order List</center>
</div>
<?php

    $_order_posts = [];
    get_posts([
        'numberposts'	=> -1,
        "post_type"     => "shop_order",
        "post_status"   => ["wc-processing"],
        'meta_query' => [
            'relation' => 'OR',
            [
                'key'     => '_customer_user',
                'value'   => '2',
                'compare' => '=',
            ],
        ]
    ]);

    $ewm_dpm_stages = [
        'wc-pending' 	=> 'Pending payment' ,
        'wc-processing' => 'Active Orders' ,
        'wc-on-hold' 	=> 'On hold' ,
        'wc-completed' 	=> 'Completed' ,
        'wc-cancelled'  => 'Cancelled' ,
        'wc-refunded' 	=> 'Refunded' ,
        'wc-failed' 	=> 'Failed' ,
    ];

?>
<div class="ewm_dpm_main_wrapper">
    <table class="ewm_dpm_client_main_table">
        <tr class="ewm_dpm_order_list_head">
            <td><center>Order ID</center></td>
            <td><center>Order Status</center></td>
            <td></td>
        </tr>

        <?php

        foreach( $_order_posts as $_order_post_k => $_order_post_v ){
            $href_url = admin_url( 'admin.php?page=ewm-dpm-orders&single_order_id='.$_order_post_v->ID );

            echo '<tr class="ewm_dpm_order_list_items">
                <td class="ewm_dpm_c_title">#'. $_order_post_v->ID .'</td>
                <td class="ewm_dpm_c_body"> '. $ewm_dpm_stages[$_order_post_v->post_status] .'</td>
                <td class="ewm_dpm_c_edit">
                    <center><a href="'.$href_url.'"> <input value="Open" type="button" class="ewm_dpm_open_order"> </a></center>
                </td>
            </tr>';
        }

        ?>
    </table>
</div>
