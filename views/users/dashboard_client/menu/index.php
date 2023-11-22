<style type="text/css">
	.ewm_dpm_d_menu_item{
		float:left !important;
	}
	.ewm_dpm_menu{
		float:right;
	}
	.ewm_dpm_d_menu_item_li{
		float: left !important;
		overflow: auto;
		min-width: 80px;
		border: solid #8080801a 1px;
		padding: 2px 15px;
		margin-right: 5px;
		cursor: pointer;
		border-radius: 11px;
	}
	.ewm_dpm_menu_top_ul{
		list-style-type: none !important;
	}
	.ewm_dpm_menu_wrapper{
		width: 100%;
		overflow: auto;
		margin-bottom: 25px;
	}
	.ewm_dpm_d_menu_item_li_user{
		background-color: white;
		border: 1px solid #6495ed47;
		color: cornflowerblue;
		border-radius: 30px;
	}
</style>
<div class="ewm_dpm_menu_wrapper">
	<div class="ewm_dpm_menu">
		<ul class="ewm_dpm_menu_top_ul">
			<li class="ewm_dpm_d_menu_item_li" data-page-name="home"><span class="ewm_dpm_d_menu_item">	Home	</span></li>
			<li class="ewm_dpm_d_menu_item_li" data-page-name="orders"><span class="ewm_dpm_d_menu_item">	Orders	</span></li>
			<li class="ewm_dpm_d_menu_item_li" data-page-name="tickets"><span class="ewm_dpm_d_menu_item">	Tickets	</span></li>
			<li class="ewm_dpm_d_menu_item_li" data-page-name="new_orders"><span class="ewm_dpm_d_menu_item">	New Order	</span></li>
			<li class="ewm_dpm_d_menu_item_li ewm_dpm_d_menu_item_li_user" data-page-name="user_manage"><span class="ewm_dpm_d_menu_item">	
				<?php

					$wp_get_current_user = wp_get_current_user();

					echo $wp_get_current_user->display_name ;
					
				?>	</span>
			</li>
			<li class="ewm_dpm_d_menu_item_li ewm_dpm_d_menu_item_li_user" data-page-name="user_manage"><span class="ewm_dpm_d_menu_item">	
				<span>
					Logout
				</span>
			</li>
		</ul>
	</div>
</div>