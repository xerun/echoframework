<?php
	/*
		Script:     paymentmanage
		Author:
		Date:       Last updated 03-12-07
		Purpose:
		Note:
	*/
    $Entity="Payment";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Payment";
    $EntityCaptionLower=strtolower($EntityCaption);

	$Where="1 = 1";
	$Echo.=CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("PaymentPurpose", "PaymentDescription", "AmountPaid", "DatePaid", "CouponCode", "CouponDiscountPercentile", "CouponDiscountAmount"),
		$ColumnTitle=array("Purpose", "Description", "Amount", "Payment Date", "Coupon Code", "Discount Percentile", "Discount Amount"),
		$ColumnShort=array("true","false","false","false","false","false", "false"),
		$ColumnAlign=array("left", "left", "center", "center", "center", "center", "center"),
		$ColumnType=array("text", "text", "text", "text", "text", "text", "text"),
		$Where,
		$AddButton=true,
		$SearchValue=array("PaymentPurpose", "PaymentDescription", "AmountPaid", "DatePaid", "CouponCode", "CouponDiscountPercentile", "CouponDiscountAmount"),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="4",
    	$SortType="desc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=false,
		$EntityCaption
	);
?>