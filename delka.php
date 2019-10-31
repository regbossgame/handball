<?
echo "<script>
function delka(obj){
      if (confirm('Вы действительно хотите удалить {object:'+obj+'}?')){
		self.location='delimg.php?name='+obj;
}
}
</script>";
?>