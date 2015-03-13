<?php echo $header; ?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 
<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
<Author><?php echo $author; ?></Author>
<Created><?php echo $creationDate; ?></Created>
</DocumentProperties>
 
<Styles>
   <Style ss:ID="s62">
      <Alignment ss:Vertical="Bottom" ss:WrapText="1"/>
      <NumberFormat ss:Format="@"/>
   </Style>
</Styles>
 
<?php foreach($dataExcel as $key_sheet => $sheet) { ?>
 
	<Worksheet ss:Name="<?php echo $sheet->sheetName; ?>">
	
	<Table>
		
	<?php foreach($sheet->columns as $key_column => $value) { ?>
	   <Column ss:AutoFitWidth="1" ss:Width="<?php echo $value->width; ?>"/>
	<?php } ?>
	   
	<?php foreach($sheet->rows as $key_row => $row) { ?>
	   <Row>
	<?php 	foreach($row->cells as $key_cell => $cell) { ?>
				 <Cell ss:StyleID="s62"><Data ss:Type="<?php echo $cell->type; ?>"><?php echo utf8_encode($cell->value); ?></Data></Cell> 
	<?php 	} ?>     
	   </Row> 
	<?php } ?>
	
	   
	</Table>
	
	</Worksheet>

<?php } ?> 








</Workbook>
