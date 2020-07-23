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

		axios.get('/api/getMessage/'+$(this).data("key"))
		.then(function (response) {
			listMessage = response['data'];
			for(message in listMessage) {
				var currentDate = new Date(listMessage[message]['created_at']);
				var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
				var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
				if (listMessage[message]['user_id'] == 3) {
					$('.chat-area-main').append('<div class="chat-msg"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text">'+listMessage[message]['content']+'.</div> </div>  </div>');
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
            let inforUser = JSON.stringify(listrooms[key]['inforUser']);
            socket.emit('joinGroup', ''+listrooms[key]['nameRoom'])
            $('div[name='+listrooms[key]['nameRoom']+']').remove()
            $('.conversation-area').append('<div name='+listrooms[key]['nameRoom']+' id='+idConnect+' data-name='+listrooms[key]['username']+' data-infor='+inforUser+' data-key ="'+listrooms[key]['nameRoom']+'" class="msg online newChatUser"> <img class="msg-profile" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="" /><div class="msg-detail"> <div class="msg-username">'+listrooms[key]['username']+'</div> <div class="msg-content"><span class="msg-message">'+listrooms[key]['inforUser']['city']+'</span></div></div></div>');
          }
        }
    });

    socket.on('my_message', function(object_message) {
		let new_message = JSON.parse(object_message);
        if (new_message.userID == 3) {
			var currentDate = new Date();
			var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
			var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
			$('.chat-area-main').append('<div class="chat-msg"><div class="chat-msg-profile"> <img class="chat-msg-img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="">  <div class="chat-msg-date">Message seen '+currentDatechat+' '+ampm+'</div> </div> <div class="chat-msg-content"> <div class="chat-msg-text">'+new_message.message+'.</div> </div>  </div>');
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
	var yourConn;

	// // click button call video 

	$("#myBtn").click(function () {
		let new_call = {
			nameRoom: nameRommCurrent,
			calling: true,
			action: 'new_call',
			userID: $('.idUserChat').text(),
		}
		sendMessageCall(new_call);
	});

	function sendMessageCall(object_mess) {
		socket.emit(object_mess.action, JSON.stringify(object_mess));
		// socket.emit(object_mess.action, object_mess);
	}

	socket.on('new_call', function(new_call) {
		let anser_call = JSON.parse(new_call);
		// let anser_call = new_call;
		if (anser_call.userID == 3) {
			if (anser_call.calling) {
					  // create an offer 
				loadVideoLocal();
				$("#myModal").modal({
					backdrop: 'static',
					keyboard: false
				});
			} else {
				alert('khong dong y')
			}
		}
	});

	socket.on('send_answer', function(object_send_answer) {
		send_answer = JSON.parse(object_send_answer);
		// send_answer = object_send_answer;
		console.log(send_answer)
		if (send_answer.userID == 3) {
		   yourConn.setRemoteDescription(new RTCSessionDescription(send_answer.data)); 
		}
	 })

	socket.on('send_candidate', function(object_send_candidate) {
		send_candidate = JSON.parse(object_send_candidate);
		// send_candidate = object_send_candidate;
		if (send_candidate.userID == 3) {
			yourConn.addIceCandidate(new RTCIceCandidate(send_candidate.data));
		}
	})

		// 	//leave videochat
	$('.button-leave').click(function () {
		stream.srcObject = null;
		let tracks = stream.getTracks();
		tracks.forEach(function(track) {
			track.stop();
		});
		remoteAudio.src = null; 
		console.log(stream);
		yourConn.close(); 
		yourConn.onicecandidate = null; 
		yourConn.onaddstream = null; 
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
						video.srcObject = mediaStream;
						yourConn.addStream(mediaStream);
						video.onloadedmetadata = function (e) {
							video.play();
						};
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
			var constraints = {
				video: true,
				audio: true,
			};
			navigator.webkitGetUserMedia(constraints, function (mediaStream) {
				stream = mediaStream;
				var video = document.querySelector('video#myVideo');
				var remoteVideo = document.querySelector('video#videoOnline')
				var localAudio = document.querySelector('#localAudio'); 
				var remoteAudio = document.querySelector('#remoteAudio'); 
				video.srcObject = stream;
				localAudio.srcObject = stream;
				video.onloadedmetadata = function (e) {
					video.play();
				};
				$('.toggle-video').css('background', '#00adff')
				
				//using Google public stun server 
				var configuration = { 
					'iceServers': [ 
						{ 
						 'url': 'stun:stun.l.google.com:19302' 
						}, 
						{ 
						 'url': 'turn:192.158.29.39:3478?transport=udp', 
						 'credential': 'JZEOEt2V3Qb0y27GRntt2u2PAYA=', 
						 'username': '28224511:1379330808' 
						}, 
						{ 
						 'url': 'turn:192.158.29.39:3478?transport=tcp', 
						 'credential': 'JZEOEt2V3Qb0y27GRntt2u2PAYA=', 
						 'username': '28224511:1379330808' 
						} 
					]
				};

				yourConn = new webkitRTCPeerConnection(configuration); 

				// // set up stream listening
				yourConn.addStream(stream)

				// //when a remote user adds stream to the peer connection, we display it 
				yourConn.onaddstream = function(event) {
					remoteVideo.srcObject = event.stream;
					// remoteAudio.srcObject = event.stream;
				}
				// // Setup ice handling
				yourConn.onicecandidate = function (event) {
					if (event.candidate) {
						sendMessageCall({ 
							nameRoom: nameRommCurrent,
							action: 'send_candidate',
							userID: $('.idUserChat').text(),
							data: event.candidate,
						});
						// tưng tự bên B cần tư vấnm, ném mẹ cái hàm sendmessagecall đi
					}
				}

				yourConn.createOffer(function (offer) {
					sendMessageCall({ 
						nameRoom: nameRommCurrent,
						action: 'send_offer',
						userID: $('.idUserChat').text(),
						data: offer,
					});
						
					yourConn.setLocalDescription(offer); 
				}, function (error) {
				alert("Error when creating an offer "+error); 
				});

			}, function (error) { 
				console.log(error); 
			}); 
		} else {
			alert("Rất xin lỗi bạn !. Trình duyệt chưa hỗ trợ");
		}

	}
	

});