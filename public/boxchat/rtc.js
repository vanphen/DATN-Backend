/////////////////////////
// insert HTML in js
function initRTC(id){
}



/////////////////////////
var socket = io.connect("http://18.183.81.183:9000/");

var nameRoom;
var nameRommCurrent;
var inforUser;


function getInforUser() {
    let data;
    let user;
    var currentDate = new Date();
    data = $.parseJSON($.ajax({
        url: 'http://ip-api.com/json/',
        dataType: "json",
        async: false
    }).responseText);
    user = {
        'country': data['country'],
        'city': data['city'],
        'timezone': data['timezone'],
        'ip': data['query'],
        'created_at': currentDate,
    }
    return user;
}

socket.on('connect', async function() {
    let inforUser = await getInforUser();
    if (sessionStorage.getItem('nameGroup')) {
        inforUser['nameGroup'] = sessionStorage.getItem('nameGroup')
    }
    if (sessionStorage.getItem('userID')) {
        inforUser['userID'] = sessionStorage.getItem('userID')
    }
    socket.emit('them_thanh_vien', 'userchat', inforUser);
});


socket.on('thong_bao', function(server, id, nameRooms) {
    nameRoom = JSON.parse(nameRooms);
    nameRommCurrent = nameRoom[id]['nameRoom'];
    sessionStorage.setItem('nameGroup', nameRommCurrent);
    sessionStorage.setItem('userID', id);
});

socket.on('my_message', function(object_message) {
    let new_message = JSON.parse(object_message);
    if (new_message.userID != 3) {
        nameRommCurrent = new_message.nameRoom
        var currentDate = new Date();
        var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
        var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
        $('.msg_card_body').append(`<div class="d-flex justify-content-start mb-4"> <div class="img_cont_msg"> <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"  class="rounded-circle user_img_msg">  </div> <div class="msg_cotainer">  ${new_message.message} .<span class="msg_time">${currentDatechat} ${ampm},Today</span></div></div>`);
        $(".msg_card_body").stop().animate({
            scrollTop: $(".msg_card_body")[0].scrollHeight
        }, 1000);
    }
})


$('textarea#streamWriter').keydown(function(e) {
    if (e.keyCode === 13 && e.ctrlKey) {
        $(this).val(function(i, val) {
            return val + "\n";
        });
    }
}).keypress(function(e) {
    if (e.keyCode === 13 && !e.ctrlKey) {
        sendMessage();
        return false;
    }
});

function sendMessage() {
    let contentChat = $('textarea#streamWriter').val().trim();
    var currentDate = new Date();
    var currentDatechat = currentDate.getHours() + ':' + currentDate.getMinutes();
    var ampm = currentDate.getHours() >= 12 ? 'PM' : 'AM';
    if (contentChat) {
        $('.msg_card_body').append(`<div class="d-flex justify-content-end mb-4"><div class="msg_cotainer_send">${contentChat}<span class="msg_time_send">${currentDatechat},${ampm} </span></div><div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div></div>`);
        $(".msg_card_body").stop().animate({
            scrollTop: $(".msg_card_body")[0].scrollHeight
        }, 1000);
        $('textarea#streamWriter').val('');
        let newmessage = {
            nameRoom: nameRommCurrent,
            username: 'userchat',
            message: contentChat,
            userID: 3,
        }
        socket.emit('new_message', JSON.stringify(newmessage));
    }
}
$('.input-group-append').click(function() {
    sendMessage();
})

$('#longanit').click(function() {
    $('.banner-noti-browser').fadeOut(500);
    $('.icon-chat').fadeIn()
})



// cal video
var stream;
var yourConn;


$("#myBtn").click(function() {
    $("#myModalCall").modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#myModal').hide();
    $('.icon-chat').fadeIn();
});

socket.on('new_call', function(object_new_call) {
    new_call = JSON.parse(object_new_call);
    // new_call = object_new_call;
    if (new_call.userID != 3) {
        let anwser_calling = true;
        if (confirm('bạn có cuộc gọi từ tư vấn viên')) {
            $("#myModalCall").modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#myModal').hide();
            $('.icon-chat').fadeIn();
            loadVideoLocal();
        } else {
            anwser_calling = true;
            $("#myModalCall").modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#myModal').hide();
            $('.icon-chat').fadeIn();
            loadVideoLocal();
        }
        let anser_new_call = {
            nameRoom: new_call.nameRoom,
            calling: anwser_calling,
            action: new_call.action,
            userID: 3,
        }
        sendMessageCall(anser_new_call)
    }
})




function sendMessageCall(object_mess) {
    socket.emit(object_mess.action, JSON.stringify(object_mess));
    // socket.emit(object_mess.action, object_mess);
}

function loadVideoLocal() {
    if (hasUserMedia()) {
        var constraints = {
            video: true,
            audio: true,
        };
        navigator.webkitGetUserMedia(constraints, function(mediaStream) {
            stream = mediaStream;
            var video = document.querySelector('video#myVideo');
            var remoteVideo = document.querySelector('#videoOnline')
            var localAudio = document.querySelector('#localAudio');
            var remoteAudio = document.querySelector('#remoteAudio');
            video.srcObject = stream;
            localAudio.srcObject = stream;

            $('.toggle-video').css('background', '#00adff')

            var configuration = {
                'iceServers': [{
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


            yourConn.addStream(stream)
            //when a remote user adds stream to the peer connection, we display it 
            yourConn.onaddstream = function(event) {
                remoteVideo.srcObject = event.stream;
                remoteAudio.srcObject = event.stream;
            }

            // Setup ice handling
            yourConn.onicecandidate = function(event) {
                if (event.candidate) {
                    sendMessageCall({
                        nameRoom: nameRommCurrent,
                        action: 'send_candidate',
                        userID: 3,
                        data: event.candidate,
                    });
                }
                // ok   m phỉa chia event ở đoạn này đéo chơi switchcase nhé
            }


        }, function(error) {
            console.log(error);
        });
    } else {
        alert("Rất xin lỗi bạn !. Trình duyệt chưa hỗ trợ");
    }

}

function hasUserMedia() {
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia || navigator.msGetUserMedia;
    return !!navigator.getUserMedia;
}


$('.button-leave').click(function() {
    remoteAudio.src = null;
    stream.srcObject = null;
    let tracks = stream.getTracks();
    tracks.forEach(function(track) {
        track.stop();
    });
    stream = null;
    yourConn.close();
    yourConn.onicecandidate = null;
    yourConn.onaddstream = null;
})

socket.on('send_offer', function(object_send_offer) {
    send_offer = JSON.parse(object_send_offer);
    // send_offer = object_send_offer;
    if (send_offer.userID != 3) {
        handleOffer(send_offer.nameRoom, send_offer.data);
    }
})

function handleOffer(nameRoom, offer) {
    yourConn.setRemoteDescription(new RTCSessionDescription(offer));
    yourConn.createAnswer(function(answer) {
        yourConn.setLocalDescription(answer);
        sendMessageCall({
            nameRoom: nameRoom,
            action: 'send_answer',
            userID: 3,
            data: answer,
        })
    }, function(error) {
        alert("Error when creating an answer");
    });
}

socket.on('send_candidate', function(object_send_candidate) {
    send_candidate = JSON.parse(object_send_candidate);
    // send_candidate = object_send_candidate;
    if (send_candidate.userID != 3) {
        yourConn.addIceCandidate(new RTCIceCandidate(send_candidate.data));
    }
})

function handleCandidate(candidate) {
    yourConn.addIceCandidate(new RTCIceCandidate(candidate));
}



// $('.toggle-video').click(function () {
//    $('#myVideo')[0].srcObject = null;
//    $('.toggle-video').css('background', '#fffcfc')
// });

$('.button-share').click(function() {
    var displayMediaStreamConstraints = {
       video: true,
       audio: true,
    };
    if (navigator.mediaDevices.getDisplayMedia) {
       navigator.mediaDevices.getDisplayMedia(displayMediaStreamConstraints)
          .then(function (mediaStream) {
             var video = document.querySelector('video#myVideo');
             video.srcObject = mediaStream;
             video.onloadedmetadata = function (e) {
                video.play();
             };
             $('.toggle-video').css('background', '#fffcfc')
          })
          .catch(function (err) { console.log(err.name + ": " + err.message); });
    } else {
       navigator.getDisplayMedia(displayMediaStreamConstraints).then(success).catch(error);
    }
});


var checkLoad = true;
$('.open-button').on('click', function(e) {
    e.preventDefault();
    var customer = {
        'name': $('.validate-input input[name="name"]').val().trim(),
        'email': $('.validate-input input[name="email"]').val().trim(),
    };
    for (let key in customer) {
        console.log(111, key)
        if (!customer[key] && key !== 'phone' && key !== 'content') {
            alert(key + ' không được để trống');
            return;
        }
        if (key == 'email') {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customer[key]) == false) {
                alert('Email không đúng định dạng');
                return;
            }
        }
    }
    sessionStorage.setItem('customer', JSON.stringify({
        name: customer['name'],
        email: customer['email'],
    }));

    $('.validate-form').hide();
    $('#myModal').fadeIn(500);
    $('.name_customer').text(customer['name'])
});


$('.button-chat').on('click', function() {
    let userName = JSON.parse(sessionStorage.getItem('customer'));
    $('.banner-noti-browser').hide();
    if (!sessionStorage.getItem('customer')) {
        $('.validate-form').fadeIn(500);
    } else {
        $('.name_customer').text(userName['nameUser'])
        $('#myModal').fadeIn(500);
        if (checkLoad) {
            addMessage();
            checkLoad = false;
        }
    }
})
// Nếu click bên ngoài đối tượng container thì ẩn nó đi
$('.close').click(function(e) {
    $('.validate-form').fadeOut(500);
    $('.icon-chat').fadeIn(500);
})
$('#close').click(function() {
    $('#myModal').hide();
    $('.banner-noti-browser').fadeIn(500);
});
$('.icon-chat').click(function() {
    $('.icon-chat').hide()
    let userName = JSON.parse(sessionStorage.getItem('customer'));

    if (!sessionStorage.getItem('customer')) {
        $('.validate-form').fadeIn(500);
    } else {
        $('.name_customer').text(userName['name'])
        $('#myModal').fadeIn(500);
        if (checkLoad) {
            addMessage();
            checkLoad = false;
        }
    }
})

$('.register-customer').on('click', function(e) {
    e.preventDefault();
    // dang ki tu van
    let inforCustomer = getInforUser();
    var customer = {
        'name': $('.validate-input input[name="name"]').val().trim(),
        'email': $('.validate-input input[name="email"]').val().trim(),
        'phone': $('.validate-input input[name="phone"]').val().trim(),
        'content': $('.validate-input input[name="content"]').val(),
        'address': inforCustomer['city'],
        'ip': inforCustomer['ip'],
    };
    for (let key in customer) {
        if (!customer[key] && key !== 'phone' && key !== 'content') {
            alert(key + ' không được để trống');
            return;
        }
        if (key == 'email') {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(customer[key]) == false) {
                alert('Email không đúng định dạng');
                return;
            }
        }
    }
    // dang ki tu van
    socket.emit('register_customer', JSON.stringify(customer));
    alert('cảm ơn bạn đã đăng kí tư vấn dịch vụ của chúng tôi')
});

function addMessage() {
    if (sessionStorage.getItem('nameGroup')) {
        socket.emit('get_message_zooms', sessionStorage.getItem('nameGroup'));
        socket.on('get_message_zoom', function(listMessage) {
            listMessages = JSON.parse(listMessage)
            listMessages.forEach(element => {
                if (element.user_id == 3) {
                    $('.msg_card_body').append(`<div class="msg-chat d-flex justify-content-end mb-4"><div class="msg_cotainer_send">${element.content}<span class="msg_time_send">today </span></div><div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div></div>`);

                } else {
                    $('.msg_card_body').append(`<div class="msg-chat d-flex justify-content-start mb-4"> <div class="img_cont_msg"> <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"  class="rounded-circle user_img_msg">  </div> <div class="msg_cotainer">  ${element.content} .<span class="msg_time">Today</span></div></div>`);
                }
            });
        })
    }
}
