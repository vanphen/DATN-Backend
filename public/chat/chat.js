$(document).ready(function () {
	var nameRommCurrent;
    $(".conversation-area").on("click", '.online', function() {
		let user  = $(this).data("infor");
		if (!user) {
			user = {
				'country': '',
				'city': '',
				'timezone' : '',
				'ip': ''
			 }
		}
		$(".conversation-area> .online").removeClass("active");
		$(this).removeClass("newChatUser");
		$(this).addClass("active");
		$('.detail-title').text($(this).data("name"))
		// set value information user
		$('.detail-subtitle').text(user['city'])
		$('.detail-change-country').text('Country : '+user['country'])
		$('.detail-change-city').text('City : ' +user['city'])
		$('.detail-change-ip').text('IP : '+user['ip'])
		$('.detail-change-timezone').text('Time Zone : '+user['timezone'])
		$(".input-datasend").attr("data-key", $(this).data("key"));
		socket.emit('joinGroup', $(this).data("key"))
		$(".chat-area-main> .chat-msg").remove();
		let idZoomCustomer = $(this).data("key")
		axios.get('/api/getMessage/'+$(this).data("key"))
		.then(function (response) {
			listMessage = response['data'];
			for(message in listMessage) {
				var currentDate = new Date(listMessage[message]['created_at']);
				var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
				var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
				if (listMessage[message]['user_id'] == 3) {
					if (idZoomCustomer === listMessage[message]['content']) {
						$('.chat-area-main').append('<div class="chat-msg"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text"><div class="card"> <div class="card-body"><h5 class="card-title">Thông báo cuộc gọi</h5><p class="card-text">Bạn có cuộc gọi từ khách hàng</p><a href="javascript:void(0)" class="btn btn-primary" onclick="clickCall()">Gọi Ngay !</a></div></div></div> </div>  </div>');
					} else {
						$('.chat-area-main').append('<div class="chat-msg"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text">'+listMessage[message]['content']+'.</div> </div>  </div>');
					}
				} else {
					$('.chat-area-main').append('<div class="chat-msg owner"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text">'+listMessage[message]['content']+'.</div> </div>  </div>');
				}
			}

		})
		.catch(function (error) {
			console.log(error);
		});
		$(".chat-area").stop().animate({ scrollTop: $(".chat-area-main")[0].scrollHeight }, 1000);
		nameRommCurrent = $(this).data("key");
    });


	var listRooms;
    socket.on('connect', function(){
        socket.emit('employee', 'employee');
    });
    
    socket.on('thong_bao_employee', function(username, idConnect, nameZoom) {
        listRooms = JSON.parse(nameZoom);
        let listrooms  = Object.values(listRooms);
        if (username === 'Disconnected') {
            delete listRooms[idConnect];
            $('#'+idConnect).remove();
        }
        if (listrooms.length != 0) {
          for (var key in listrooms) {
			if (listrooms[key]['inforUser'].company_id == userIDCurrent) {
				let inforUser = JSON.stringify(listrooms[key]['inforUser']);
				socket.emit('joinGroup', ''+listrooms[key]['nameRoom'])
				$('div[name='+listrooms[key]['nameRoom']+']').remove()
				$('.conversation-area').append('<div name='+listrooms[key]['nameRoom']+' id='+idConnect+' data-name='+listrooms[key]['username']+' data-infor='+inforUser+' data-key ="'+listrooms[key]['nameRoom']+'" class="msg online newChatUser"> <img class="msg-profile" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="" /><div class="msg-detail"> <div class="msg-username">'+listrooms[key]['username']+'</div> <div class="msg-content"><span class="msg-message">'+listrooms[key]['inforUser']['city']+'</span></div></div></div>');
			}
          }
        }
    });

    socket.on('my_message', function(object_message) {
		let new_message = JSON.parse(object_message);
		console.log(1111,new_message);
        if (new_message.userID == 3) {
			var x = document.getElementById("myAudio"); 
			x.play();
			var currentDate = new Date();
			var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
			var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
			$('div[name ="'+new_message.nameRoom+'"]').addClass('newChatUser');
			if (new_message.message == new_message.nameRoom) {
				$('.chat-area-main').append('<div class="chat-msg"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text"><div class="card"> <div class="card-body"><h5 class="card-title">Thông báo cuộc gọi</h5><p class="card-text">Bạn có cuộc gọi từ khách hàng</p><a href="javascript:void(0)" class="btn btn-primary" onclick="clickCall()">Gọi Ngay !</a></div></div></div> </div>  </div>');
			} else {
				$('.chat-area-main').append('<div class="chat-msg"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text">'+new_message.message+'.</div> </div>  </div>');
			}
			$(".chat-area").stop().animate({ scrollTop: $(".chat-area-main")[0].scrollHeight }, 1000);
        }
    })
    
    // send message
    $('.input-datasend').keypress(function (e) {
        if (e.keyCode === 13 && !e.ctrlKey) {
            sendMessage($('.input-datasend').val());
            // return false;
        }
     });
    $('.dataSend').click( function() {
        sendMessage($('.input-datasend').val());
    });

    function sendMessage(contentMessage) {
        var currentDate = new Date();
        var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
        var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
        var nameGroup = $('.input-datasend').data("key");
        $('.chat-area-main').append('<div class="chat-msg owner"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text">'+contentMessage+'.</div> </div>  </div>');
        $('.input-datasend').val('');
		$(".chat-area").stop().animate({ scrollTop: $(".chat-area-main")[0].scrollHeight }, 1000);
		let message_new = {
			nameRoom: nameGroup,
			username: 'employee',
			message: contentMessage,
			userID: $('.idUserChat').text(),
		}
		socket.emit('new_message', JSON.stringify(message_new));
	}
	
	
	var stream;
	var peerConnect;
	var timeOut;

	// // click button call video 


	$("#myBtn").click(function () {
		if (!nameRommCurrent) {
			alert('Bạn chưa chọn Room để call');
			return;
		}
		$('body').LoadingOverlay("show");
		let new_call = {
			nameRoom: nameRommCurrent,
			calling: true,
			action: 'new_call',
			userID: $('.idUserChat').text(),
		}
		sendMessageCall(new_call);
		timeOut = setTimeout(function(){
			$('body').LoadingOverlay("hide");
			alert("Người dùng không bắt máy"); 
		}, 30000);
	});

	function sendMessageCall(object_mess) {
		socket.emit(object_mess.action, JSON.stringify(object_mess));
		// socket.emit(object_mess.action, object_mess);
	}

	socket.on('new_call', function(new_call) {
		let anser_call = JSON.parse(new_call);
		// let anser_call = new_call;
		if (anser_call.userID == 3) {
			clearTimeout(timeOut);
			if (anser_call.calling) {
					  // create an offer 
				loadVideoLocal();
				$("#myModal").modal({
					backdrop: 'static',
					keyboard: false
				});
			} else {
				alert('Khách hàng từ chối cuộc gọi')
			}
			$('body').LoadingOverlay("hide");
		}
	});

	socket.on('send_answer', function(object_send_answer) {
		console.log('send_ansser');
		send_answer = JSON.parse(object_send_answer);
		console.log(send_answer);

		// send_answer = object_send_answer;
		console.log(send_answer)
		if (send_answer.userID == 3) {
		   peerConnect.setRemoteDescription(new RTCSessionDescription(send_answer.data)); 
		}
		console.log(666,peerConnect);
	 })

	socket.on('send_candidate', function(object_send_candidate) {
		console.log('send_candidate');
		send_candidate = JSON.parse(object_send_candidate);
		// send_candidate = object_send_candidate;
		if (send_candidate.userID == 3) {
			peerConnect.addIceCandidate(new RTCIceCandidate(send_candidate.data));
		}
	})

		// 	//leave videochat
	$('.button-leave').click(function () {
        stream.getTracks().forEach(function(track) {
            track.stop()
        });
        peerConnect.close();
	})
	
	
	// 	// $('.toggle-video').click(function () {
	// 	// 	$('#myVideo')[0].srcObject = null;
	// 	// 	$('.toggle-video').css('background', '#fffcfc')
	// 	// });
	
	
		//shareScreen
		$('.button-share').click(function () {
			var displayMediaStreamConstraints = {
				video: true,
				audio: true,
			};
			if (navigator.mediaDevices.getDisplayMedia) {
				navigator.mediaDevices.getDisplayMedia(displayMediaStreamConstraints)
					.then(function (mediaStream) {
						var video = document.querySelector('video#myVideo');
						stream = mediaStream;
						video.srcObject = mediaStream;
						let videoStream = mediaStream.getVideoTracks()[0]
						var sender = peerConnect.getSenders().find(function(s) {
						return s.track.kind == videoStream.kind;
						});
						sender.replaceTrack(videoStream);
						$('.toggle-video').css('background', '#fffcfc')
					})
					.catch(function (err) {
						console.log(err.name + ": " + err.message);
					});
			} else {
				navigator.getDisplayMedia(displayMediaStreamConstraints).then(success).catch(error);
			}
		});
		
		
	

	
	// 	// check Mediastrem
	function hasUserMedia() {
		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
			navigator.mozGetUserMedia || navigator.msGetUserMedia;
		return !!navigator.getUserMedia;
	}
	
	
	// function loadVideoLocal and canidate
	function loadVideoLocal() {
		if (hasUserMedia()) {
			$('.toggle-video').css('background', '#00adff')
			var video = document.querySelector('video#myVideo');
			var remoteVideo = document.querySelector('video#videoOnline')

			var configuration = { 
				'iceServers': [ 
					{
						url: 'turn:numb.viagenie.ca',
						credential: 'thanhph',
						username: 'phamnoone@gmail.com'
					},
					{
						url: 'turn:numb.viagenie.ca',
						credential: 'muazkh',
						username: 'webrtc@live.com'
					},
					{
						url: 'turn:192.158.29.39:3478?transport=udp',
						credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
						username: '28224511:1379330808'
					},
					{
						url: 'turn:192.158.29.39:3478?transport=tcp',
						credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
						username: '28224511:1379330808'
					},
					{
						url: 'turn:turn.bistri.com:80',
						credential: 'homeo',
						username: 'homeo'
					 },
					 {
						url: 'turn:turn.anyfirewall.com:443?transport=tcp',
						credential: 'webrtc',
						username: 'webrtc'
					}
				]
			};

			peerConnect = new webkitRTCPeerConnection(configuration);
			navigator.webkitGetUserMedia({video: true,audio: true,}, function (mediaStream) {
				stream = mediaStream;
				streamVideo = mediaStream.clone();
				peerConnect.addStream(streamVideo)
				mediaStream.removeTrack(mediaStream.getAudioTracks()[0]);
				video.srcObject = mediaStream;

				peerConnect.onaddstream = function(event) {
					remoteVideo.srcObject = event.stream;
				}
				peerConnect.onicecandidate = function(event) {
					if (event.candidate) {
						sendMessageCall({ 
							nameRoom: nameRommCurrent,
							action: 'send_candidate',
							userID: $('.idUserChat').text(),
							data: event.candidate,
						});
					}
				}
				peerConnect.createOffer(function (offer) {
					console.log('send_offer');
					sendMessageCall({ 
						nameRoom: nameRommCurrent,
						action: 'send_offer',
						userID: $('.idUserChat').text(),
						data: offer,
					});
					peerConnect.setLocalDescription(offer); 
				}, function (error) {alert("Error when creating an offer "+error); });

			}, function (error) {console.log(error);}); 
		} else {
			alert("Rất xin lỗi bạn !. Trình duyệt chưa hỗ trợ");
		}

	}
	

});
