$.fn.qrcode = function (options) {
	const defaults = {
		text: "qrcode",
		id: "qrcode",
		background: "FFFFFF",
		color: "000000",
		width: 200,
		height: 200,
		margin: 3,
		type: "svg",
		qzone: 0,
		ecc: "H",
		onSuccess: function () { },
	};
	var settings = $.extend({}, defaults, options);

	var imageUrl =
		"https://api.qrserver.com/v1/create-qr-code/"+
		"?data=" + encodeURI(settings.text) +
		"&margin=" + settings.margin +
		"&color=" + settings.color +
		"&bgcolor=" + settings.background +
		"&format=" + settings.type +
		"&qzone=" + settings.qzone +
		"&ecc=" + settings.ecc +
		"&size=" + settings.width+"x"+settings.height;

	return this.each(function () {
		var element = $(this);
		fetch(imageUrl)
			.then((response) => response.blob())
			.then((blob) => {
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function () {
					var base64Url = reader.result;
					console.log(base64Url);
					if (element[0].nodeName === "IMG") {
						element.attr("src", base64Url);
						if (settings.onSuccess) {
							settings.onSuccess(base64Url);
						}
					} else if (element[0].nodeName === "DIV") {
						var qrcodeImage = $(settings.id, element);
						if (qrcodeImage.length) {
							qrcodeImage.attr("src", base64Url);
							if (settings.onSuccess) {
								settings.onSuccess(base64Url);
							}
						} else {
							var newImage = $("<img>", {
								id: settings.id,
								src: base64Url,
							});
							element.append(newImage);
							if (settings.onSuccess) {
								settings.onSuccess(base64Url);
							}
						}
					}
				};
			})
			.catch((error) => {
				console.error(error);
				if (settings.onError) {
					settings.onError(error);
				}
			});
	});
};
