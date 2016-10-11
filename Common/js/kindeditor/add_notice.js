KindEditor.ready(function(K) {
	var editor1 = K.create('textarea[name="content"]', {
		cssPath : $("#root").val()+'/Common/js/kindeditor/plugins/code/prettify.css',
		uploadJson : $("#root").val()+'/Common/js/kindeditor/php/upload_json.php',
		fileManagerJson : $("#root").val()+'/Common/js/kindeditor/php/file_manager_json.php',
		allowFileManager : true,
		items : ['bold','fontsize','emoticons','italic'],
		/*items : ['fontname', 'fontsize','|','forecolor','hilitecolor','bold','italic',
		'underline','removeformat','|', 'justifyleft','justifycenter', 'justifyright',
		'insertorderedlist','insertunorderedlist','|', 'emoticons','fullscreen','link']*/

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