<?php
include('config.php');

$sid=$_GET['sid'];
		$sq=mysql_query("select * from phppos_sales where sale_id='$sid'");
		$ro=mysql_fetch_row($sq);
		
		$sq1=mysql_query("select * from phppos_people where person_id='$ro[1]'");
		$ro1=mysql_fetch_row($sq1);
		
        $sq2=mysql_query("select * from phppos_sales_items where sale_id='$sid'");
		$ro2=mysql_fetch_row($sq2);
        
		$sq3=mysql_query("select * from phppos_items where item_id='$ro2[1]'");
		$ro3=mysql_fetch_row($sq3);
		
        $sq4=mysql_query("select * from phppos_sales_items_taxes where sale_id='$sid' and item_id='$ro2[1]'");
		$ro4=mysql_fetch_row($sq4);
		
		$sq5=mysql_query("select * from phppos_sales_payments where sale_id='$sid'");
		$ro5=mysql_fetch_row($sq5);
		
//$xml="<>";//element string

//$xml.="<>".$row[]."<>";
//$xml.="<>".$row[]."<>";

$xml='<ENVELOPE>
 <HEADER>
  <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
  <IMPORTDATA>
   <REQUESTDESC>
    <REPORTNAME>Vouchers</REPORTNAME>
    <STATICVARIABLES>
     <SVCURRENTCOMPANY>SUNRISE SPORTS &amp; FITNESS - (From 1-Apr-2010) FINAL</SVCURRENTCOMPANY>
    </STATICVARIABLES>
   </REQUESTDESC>
   <REQUESTDATA>
    <TALLYMESSAGE xmlns:UDF="TallyUDF">';
	
     $xml.="<VOUCHER REMOTEID='".$sid;
	 //"989755e0-a5d7-11de-8655-0014859c82f4-000018bd" 
	 $xml.="' VCHKEY='".$sid;
	 //989755e0-a5d7-11de-8655-0014859c82f4-0000a195:00000008" 
	 $xml.="' VCHTYPE=\"Sales\" ACTION=\"Create\" OBJVIEW=\"Invoice Voucher View\">";
      $xml.="<ADDRESS.LIST TYPE=\"String\">";
       $xml.="<ADDRESS>".$ro1[4]./*Sunsai Sports &amp; Fitness*/"</ADDRESS>";
       $xml.="<ADDRESS>".$ro1[5]./*Krishna Leela Chambers,*/"</ADDRESS>";
       $xml.="<ADDRESS>".$ro1[6]./*Pune.*/"</ADDRESS>";
      $xml.="</ADDRESS.LIST>";
      $xml.="<BASICBUYERADDRESS.LIST TYPE=\"String\">";
       $xml.="<BASICBUYERADDRESS>".$ro1[4]./*Sunsai Sports &amp; Fitness*/"</BASICBUYERADDRESS>";
       $xml.="<BASICBUYERADDRESS>".$ro1[5]./*Krishna Leela Chambers,*/"</BASICBUYERADDRESS>";
       $xml.="<BASICBUYERADDRESS>".$ro1[6]./*Pune.*/"</BASICBUYERADDRESS>";
      $xml.="</BASICBUYERADDRESS.LIST>";
      $xml.="<OLDAUDITENTRYIDS.LIST TYPE=\"Number\">";
       $xml.="<OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>";
      $xml.="</OLDAUDITENTRYIDS.LIST>";
      $xml.="<DATE>".$ro[0]./*20130402*/"</DATE>";
      $xml.="<GUID>".$sid./*989755e0-a5d7-11de-8655-0014859c82f4-000018bd*/"</GUID>";
      $xml.="<NARRATION>Bank ICICI Account Name: SUNRISE SPORTS &amp; FITNESS Account No. 041805000530. IFSC Code: ICIC 0000 418 Branch  Borivali ( East ) .  ** ** BANK OF BARODA : Account No. 40420200000014    ......NEFT / RTGS CODE : BARB 0 DAHEAS. BRANCH  DAHISAR ( Eas</NARRATION>";
      $xml.="<PARTYNAME>".$ro1[0]." ".$ro1[1]./*Sunsai  Sports &amp; Fitness*/"</PARTYNAME>";
      $xml.="<VOUCHERTYPENAME>Sales</VOUCHERTYPENAME>";
      $xml.="<VOUCHERNUMBER>".$sid./*SP -1*/"</VOUCHERNUMBER>";
      $xml.="<PARTYLEDGERNAME>".$ro1[0]." ".$ro1[1]./*Sunsai  Sports &amp; Fitness*/"</PARTYLEDGERNAME>";
      $xml.="<BASICBASEPARTYNAME>".$ro1[0]." ".$ro1[1]./*Sunsai  Sports &amp; Fitness*/"</BASICBASEPARTYNAME>";
      $xml.="<CSTFORMISSUETYPE/>
      <CSTFORMRECVTYPE/>
      <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
      <PERSISTEDVIEW>Invoice Voucher View</PERSISTEDVIEW>";
      $xml.="<BASICBUYERNAME>".$ro1[0]." ".$ro1[1]./*Sunsai  Sports &amp; Fitness*/"</BASICBUYERNAME>";
      $xml.="<BASICDATETIMEOFINVOICE>".$ro[0]./*2-Apr-2013 at 12:19*/"</BASICDATETIMEOFINVOICE>";
      $xml.="<BASICDATETIMEOFREMOVAL>".$ro[0]./*2-Apr-2013 at 12:19*/"</BASICDATETIMEOFREMOVAL>";
      $xml.="<VCHGSTCLASS/>
      <ENTEREDBY>Dave</ENTEREDBY>
      <DIFFACTUALQTY>No</DIFFACTUALQTY>
      <AUDITED>No</AUDITED>
      <FORJOBCOSTING>No</FORJOBCOSTING>
      <ISOPTIONAL>No</ISOPTIONAL>";
      $xml.="<EFFECTIVEDATE>".$ro[0]./*20130402*/"</EFFECTIVEDATE>";
      $xml.="<ISFORJOBWORKIN>No</ISFORJOBWORKIN>
      <ALLOWCONSUMPTION>No</ALLOWCONSUMPTION>
      <USEFORINTEREST>No</USEFORINTEREST>
      <USEFORGAINLOSS>No</USEFORGAINLOSS>
      <USEFORGODOWNTRANSFER>No</USEFORGODOWNTRANSFER>
      <USEFORCOMPOUND>No</USEFORCOMPOUND>";
      $xml.="<ALTERID>".$sid./* 12635*/"</ALTERID>";
      $xml.="<EXCISEOPENING>No</EXCISEOPENING>
      <USEFORFINALPRODUCTION>No</USEFORFINALPRODUCTION>
      <ISCANCELLED>No</ISCANCELLED>
      <HASCASHFLOW>No</HASCASHFLOW>
      <ISPOSTDATED>No</ISPOSTDATED>
      <USETRACKINGNUMBER>No</USETRACKINGNUMBER>
      <ISINVOICE>Yes</ISINVOICE>
      <MFGJOURNAL>No</MFGJOURNAL>
      <HASDISCOUNTS>No</HASDISCOUNTS>
      <ASPAYSLIP>No</ASPAYSLIP>
      <ISCOSTCENTRE>No</ISCOSTCENTRE>
      <ISSTXNONREALIZEDVCH>No</ISSTXNONREALIZEDVCH>
      <ISEXCISEMANUFACTURERON>No</ISEXCISEMANUFACTURERON>
      <ISBLANKCHEQUE>No</ISBLANKCHEQUE>
      <ISDELETED>No</ISDELETED>
      <ASORIGINAL>No</ASORIGINAL>
      <VCHISFROMSYNC>No</VCHISFROMSYNC>";
      $xml.="<MASTERID>".$sid./* 6333*/"</MASTERID>";
      $xml.="<VOUCHERKEY>".$sid./*177661322199048*/"</VOUCHERKEY>";
      $xml.="<OLDAUDITENTRIES.LIST>      </OLDAUDITENTRIES.LIST>
      <ACCOUNTAUDITENTRIES.LIST>      </ACCOUNTAUDITENTRIES.LIST>
      <AUDITENTRIES.LIST>      </AUDITENTRIES.LIST>
      <INVOICEDELNOTES.LIST>      </INVOICEDELNOTES.LIST>
      <INVOICEORDERLIST.LIST>      </INVOICEORDERLIST.LIST>
      <INVOICEINDENTLIST.LIST>      </INVOICEINDENTLIST.LIST>
      <ATTENDANCEENTRIES.LIST>      </ATTENDANCEENTRIES.LIST>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE=\"Number\">";
        $xml.="<OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>";
       $xml.="</OLDAUDITENTRYIDS.LIST>";
       $xml.="<LEDGERNAME>".$ro1[0]." ".$ro1[1]./*Sunsai  Sports &amp; Fitness*/"</LEDGERNAME>";
       $xml.="<GSTCLASS/>
       <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>Yes</ISLASTDEEMEDPOSITIVE>";
       $xml.="<AMOUNT>-".$ro2[7]./*-36000.00*/"</AMOUNT>";
       $xml.="<BANKALLOCATIONS.LIST>       </BANKALLOCATIONS.LIST>
       <BILLALLOCATIONS.LIST>
        <NAME>SP -1</NAME>
        <BILLTYPE>New Ref</BILLTYPE>
        <TDSDEDUCTEEISSPECIALRATE>No</TDSDEDUCTEEISSPECIALRATE>";
        $xml.="<AMOUNT>-".$ro2[7]./*-36000.00*/"</AMOUNT>";
        $xml.="<INTERESTCOLLECTION.LIST>        </INTERESTCOLLECTION.LIST>
       </BILLALLOCATIONS.LIST>
       <INTERESTCOLLECTION.LIST>       </INTERESTCOLLECTION.LIST>
       <OLDAUDITENTRIES.LIST>       </OLDAUDITENTRIES.LIST>
       <ACCOUNTAUDITENTRIES.LIST>       </ACCOUNTAUDITENTRIES.LIST>
       <AUDITENTRIES.LIST>       </AUDITENTRIES.LIST>
       <TAXBILLALLOCATIONS.LIST>       </TAXBILLALLOCATIONS.LIST>
       <TAXOBJECTALLOCATIONS.LIST>       </TAXOBJECTALLOCATIONS.LIST>
       <TDSEXPENSEALLOCATIONS.LIST>       </TDSEXPENSEALLOCATIONS.LIST>
       <VATSTATUTORYDETAILS.LIST>       </VATSTATUTORYDETAILS.LIST>
       <COSTTRACKALLOCATIONS.LIST>       </COSTTRACKALLOCATIONS.LIST>
      </LEDGERENTRIES.LIST>
      <LEDGERENTRIES.LIST>
       <OLDAUDITENTRYIDS.LIST TYPE=\"Number\">";
        $xml.="<OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>";
       $xml.="</OLDAUDITENTRYIDS.LIST>
       <BASICRATEOFINVOICETAX.LIST TYPE=\"Number\">
        <BASICRATEOFINVOICETAX>".$ro4[4]."</BASICRATEOFINVOICETAX>
       </BASICRATEOFINVOICETAX.LIST>
       <TAXCLASSIFICATIONNAME>Output VAT @ 12.5%</TAXCLASSIFICATIONNAME>
       <LEDGERNAME>Output Vat 12.5 %</LEDGERNAME>
       <GSTCLASS/>
       <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <LEDGERFROMITEM>No</LEDGERFROMITEM>
       <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
       <ISPARTYLEDGER>No</ISPARTYLEDGER>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>";
       $tax=$ro5[2]*$ro4[4]/100.0;
       $xml.="<AMOUNT>".$tax."</AMOUNT>";
       $xml.="<VATASSESSABLEVALUE>".$vatAssessableValue./*32000.00*/"</VATASSESSABLEVALUE>";
       $xml.="<BANKALLOCATIONS.LIST>       </BANKALLOCATIONS.LIST>
       <BILLALLOCATIONS.LIST>       </BILLALLOCATIONS.LIST>
       <INTERESTCOLLECTION.LIST>       </INTERESTCOLLECTION.LIST>
       <OLDAUDITENTRIES.LIST>       </OLDAUDITENTRIES.LIST>
       <ACCOUNTAUDITENTRIES.LIST>       </ACCOUNTAUDITENTRIES.LIST>
       <AUDITENTRIES.LIST>       </AUDITENTRIES.LIST>
       <TAXBILLALLOCATIONS.LIST>       </TAXBILLALLOCATIONS.LIST>
       <TAXOBJECTALLOCATIONS.LIST>
        <CATEGORY>Output VAT @ 12.5%</CATEGORY>
        <TAXTYPE>".$ro4[3]."</TAXTYPE>
        <TAXNAME>SP -1</TAXNAME>";
        $xml.="<PARTYLEDGER>".$ro1[0]." ".$ro1[1]./*Sunsai  Sports &amp; Fitness*/"</PARTYLEDGER>";
        $xml.="<REFTYPE>New Ref</REFTYPE>
        <ISOPTIONAL>No</ISOPTIONAL>
        <ISPANVALID>No</ISPANVALID>
        <ZERORATED>No</ZERORATED>
        <EXEMPTED>No</EXEMPTED>
        <ISSPECIALRATE>No</ISSPECIALRATE>
        <ISDEDUCTNOW>No</ISDEDUCTNOW>
        <ISPANNOTAVAILABLE>No</ISPANNOTAVAILABLE>
        <OLDAUDITENTRIES.LIST>        </OLDAUDITENTRIES.LIST>
        <ACCOUNTAUDITENTRIES.LIST>        </ACCOUNTAUDITENTRIES.LIST>
        <AUDITENTRIES.LIST>        </AUDITENTRIES.LIST>
        <SUBCATEGORYALLOCATION.LIST>";
         $xml.="<STOCKITEMNAME>".$ro3[0]./*IT - 7004 Strech Machine*/"</STOCKITEMNAME>";
         $xml.="<SUBCATEGORY>VAT</SUBCATEGORY>
         <DUTYLEDGER>Output Vat 12.5 %</DUTYLEDGER>
         <SUBCATZERORATED>No</SUBCATZERORATED>
         <SUBCATEXEMPTED>No</SUBCATEXEMPTED>
         <SUBCATISSPECIALRATE>No</SUBCATISSPECIALRATE>
         <TAXRATE>".$ro4[4]."</TAXRATE>";
         $xml.="<ASSESSABLEAMOUNT>".$assessableAmount./*32000.00*/"</ASSESSABLEAMOUNT>";
         $xml.="<TAX>".$tax./*4000.00*/"</TAX>";
         $xml.="<BILLEDQTY>".$ro2[5]./* 2 no*/"</BILLEDQTY>";
        $xml.="</SUBCATEGORYALLOCATION.LIST>
       </TAXOBJECTALLOCATIONS.LIST>
       <TDSEXPENSEALLOCATIONS.LIST>       </TDSEXPENSEALLOCATIONS.LIST>
       <VATSTATUTORYDETAILS.LIST>       </VATSTATUTORYDETAILS.LIST>
       <COSTTRACKALLOCATIONS.LIST>       </COSTTRACKALLOCATIONS.LIST>
       <UDF:MAHWCASSESSABLEVALUE.LIST DESC=\"`MAHWCAssessableValue`\" ISLIST=\"YES\" TYPE=\"Amount\">";
        $xml.="<UDF:MAHWCASSESSABLEVALUE DESC=\"`MAHWCAssessableValue`\">".$mahwAccessibleValue./*32000.00*/"</UDF:MAHWCASSESSABLEVALUE>";
       $xml.="</UDF:MAHWCASSESSABLEVALUE.LIST>
      </LEDGERENTRIES.LIST>
      <ALLINVENTORYENTRIES.LIST>";
       $xml.="<STOCKITEMNAME>".$ro3[0]./*IT - 7004 Strech Machine*/"</STOCKITEMNAME>";
       $xml.="<ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
       <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>
       <ISAUTONEGATE>No</ISAUTONEGATE>
       <ISCUSTOMSCLEARANCE>No</ISCUSTOMSCLEARANCE>
       <ISTRACKCOMPONENT>No</ISTRACKCOMPONENT>
       <ISTRACKPRODUCTION>No</ISTRACKPRODUCTION>
       <ISPRIMARYITEM>No</ISPRIMARYITEM>
       <ISSCRAP>No</ISSCRAP>";
       $xml.="<RATE>".$ro2[7]./*16000.00/no*/"</RATE>";
	   $am=$ro2[7]*$ro2[5];
       $xml.="<AMOUNT>".$am./*32000.00*/"</AMOUNT>";
       $xml.="<ACTUALQTY>".$ro3[7]./* 2 no*/"</ACTUALQTY>";
       $xml.="<BILLEDQTY>".$ro2[5]./* 2 no*/"</BILLEDQTY>";
       $xml.="<BATCHALLOCATIONS.LIST>
        <GODOWNNAME>Main Location</GODOWNNAME>
        <BATCHNAME>Primary Batch</BATCHNAME>
        <DESTINATIONGODOWNNAME>Main Location</DESTINATIONGODOWNNAME>
        <INDENTNO/>
        <ORDERNO/>
        <TRACKINGNUMBER/>
        <DYNAMICCSTISCLEARED>No</DYNAMICCSTISCLEARED>";
        $xml.="<AMOUNT>".$am./*32000.00*/"</AMOUNT>";
        $xml.="<ACTUALQTY>".$ro3[7]./* 2 no*/"</ACTUALQTY>";
        $xml.="<BILLEDQTY>".$ro2[5]./* 2 no*/"</BILLEDQTY>";
        $xml.="<ADDITIONALDETAILS.LIST>        </ADDITIONALDETAILS.LIST>
        <VOUCHERCOMPONENTLIST.LIST>        </VOUCHERCOMPONENTLIST.LIST>
       </BATCHALLOCATIONS.LIST>
       <ACCOUNTINGALLOCATIONS.LIST>
        <OLDAUDITENTRYIDS.LIST TYPE=\"Number\">";
         $xml.="<OLDAUDITENTRYIDS>-1</OLDAUDITENTRYIDS>";
        $xml.="</OLDAUDITENTRYIDS.LIST>
        <TAXCLASSIFICATIONNAME>Output VAT @ 12.5%</TAXCLASSIFICATIONNAME>
        <LEDGERNAME>SALES ACCOUNTS</LEDGERNAME>

        <GSTCLASS/>
        <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
        <LEDGERFROMITEM>No</LEDGERFROMITEM>
        <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
        <ISPARTYLEDGER>No</ISPARTYLEDGER>
        <ISLASTDEEMEDPOSITIVE>No</ISLASTDEEMEDPOSITIVE>";
        $xml.="<AMOUNT>".$am./*32000.00*/"</AMOUNT>";
        $xml.="<BANKALLOCATIONS.LIST>        </BANKALLOCATIONS.LIST>
        <BILLALLOCATIONS.LIST>        </BILLALLOCATIONS.LIST>
        <INTERESTCOLLECTION.LIST>        </INTERESTCOLLECTION.LIST>
        <OLDAUDITENTRIES.LIST>        </OLDAUDITENTRIES.LIST>
        <ACCOUNTAUDITENTRIES.LIST>        </ACCOUNTAUDITENTRIES.LIST>
        <AUDITENTRIES.LIST>        </AUDITENTRIES.LIST>
        <TAXBILLALLOCATIONS.LIST>        </TAXBILLALLOCATIONS.LIST>
        <TAXOBJECTALLOCATIONS.LIST>        </TAXOBJECTALLOCATIONS.LIST>
        <TDSEXPENSEALLOCATIONS.LIST>        </TDSEXPENSEALLOCATIONS.LIST>
        <VATSTATUTORYDETAILS.LIST>        </VATSTATUTORYDETAILS.LIST>
        <COSTTRACKALLOCATIONS.LIST>        </COSTTRACKALLOCATIONS.LIST>
       </ACCOUNTINGALLOCATIONS.LIST>
       <EXCISEALLOCATIONS.LIST>       </EXCISEALLOCATIONS.LIST>
       <EXPENSEALLOCATIONS.LIST>       </EXPENSEALLOCATIONS.LIST>
      </ALLINVENTORYENTRIES.LIST>
      <ATTDRECORDS.LIST>      </ATTDRECORDS.LIST>
     </VOUCHER>
    </TALLYMESSAGE>
    <TALLYMESSAGE xmlns:UDF=\"TallyUDF\">
     <COMPANY>
      <REMOTECMPINFO.LIST MERGE=\"Yes\">";
       $xml.="<NAME>".$sid./*989755e0-a5d7-11de-8655-0014859c82f4*/"</NAME>";
       $xml.="<REMOTECMPNAME>SUNRISE SPORTS &amp; FITNESS - (From 1-Apr-2010) FINAL</REMOTECMPNAME>";
       $xml.="<REMOTECMPSTATE>Maharashtra</REMOTECMPSTATE>";
      $xml.="</REMOTECMPINFO.LIST>
     </COMPANY>
    </TALLYMESSAGE>
    <TALLYMESSAGE xmlns:UDF=\"TallyUDF\">
     <COMPANY>
      <REMOTECMPINFO.LIST MERGE=\"Yes\">";
       $xml.="<NAME>".$sid./*989755e0-a5d7-11de-8655-0014859c82f4*/"</NAME>";
       $xml.="<REMOTECMPNAME>SUNRISE SPORTS &amp; FITNESS - (From 1-Apr-2010) FINAL</REMOTECMPNAME>";
       $xml.="<REMOTECMPSTATE>Maharashtra</REMOTECMPSTATE>";
      $xml.="</REMOTECMPINFO.LIST>
     </COMPANY>
    </TALLYMESSAGE>
   </REQUESTDATA>
  </IMPORTDATA>
 </BODY>
</ENVELOPE>";
//$xmlobj=new SimpleXMLElement($xml);
//$xmlobj->asXML("text.xml");
$filename = 'MyXMLFIle.xml';
$file = fopen( $filename, "w+" );
if( $file == false )
{
   echo ( "Error in opening new file" );
   exit();
}
fwrite( $file, $xml );
fclose( $file );
//echo $xml;
echo "The file has been successfully created, Please <a href='MyXMLFIle.xml'>Right Click here </a> to download";
?>