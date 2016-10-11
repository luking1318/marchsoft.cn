KindEditor.ready(function(K) {
	var editor1 = K.create('textarea[name="content"]', {
		cssPath : $("#root").val()+'/Common/js/kindeditor/plugins/code/prettify.css',
		uploadJson : $("#root").val()+'/Common/js/kindeditor/php/upload_json.php',
		fileManagerJson : $("#root").val()+'/Common/js/kindeditor/php/file_manager_json.php',
		allowFileManager : true,
		afterCreate : function() {
			var self = this;
			K.ctrl(document, 13, function() {
				self.sync();
				K('form[name=example]')[0].submit();
			});
			K.ctrl(self.edit.doc, 13, function() {
				self.sync();
				K('form[name=example]')[0].submit();
			});
		}
	});
	prettyPrint();
});