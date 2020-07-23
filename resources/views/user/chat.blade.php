@extends('layouts.app')

@section('css')
<link href="{{ asset('library/chat.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="app">
 <div class="header">
    <h5>Hội thoại của tôi</h5>
  <div class="user-settings">
    <p class="p1">Thông tin user</p>
    </div>
  </div>
 <div class="wrapper">
  <div class="conversation-area">
   @foreach($rooms as $roomID)
   <div class="msg online" name="<?php echo $roomID ?>" data-key="<?php echo $roomID ?>">
    <img class="msg-profile" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" alt="" />
    <div class="msg-detail">
     <div class="msg-username">User</div>
     <div class="msg-content">
      <span class="msg-message">ID Zoom : <?php echo $roomID ?></span>
     </div>
    </div>
   </div>
   @endforeach


    </div>
  <div class="chat-area">
   <div class="chat-area-header">
    <div class="chat-area-title">Thông tin hội thoại</div>
    <div class="chat-area-group">
       <img class="chat-area-profile" src="https://www.kindpng.com/picc/m/130-1300217_user-icon-member-icon-png-transparent-png.png" alt="">
       <img class="chat-area-profile" src="https://st.quantrimang.com/photos/image/2020/05/09/Tich-xanh.png" alt="" />
    </div>
   </div>
   <div class="chat-area-main">

   </div>
   <div class="chat-area-footer"  >
    <svg  id="myBtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
     <path d="M23 7l-7 5 7 5V7z" />
     <rect x="1" y="5" width="15" height="14" rx="2" ry="2" /></svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
     <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
    <input  class='input-datasend' type="text" placeholder="Type something here..." />
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile">
     <circle cx="12" cy="12" r="10" />
     <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" /></svg>
    <svg class="dataSend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
     <path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3" /></svg>
   </div>
  </div>
  <div class="detail-area">
   <div class="detail-area-header">
    <div class="msg-profile group">
     <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
      <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2zM12 22v-6.5" />
      <path d="M22 8.5l-10 7-10-7" />
      <path d="M2 15.5l10-7 10 7M12 2v6.5" /></svg>
    </div>
    <div class="detail-title">Thaopv</div>
    <div class="detail-subtitle">Hoạt động</div>

   </div>
   <div class="detail-changes">
    
    <div class="detail-change detail-change-country">
    </div>
    <div class="detail-change detail-change-city">
    </div>
     <div class="detail-change detail-change-ip">
    </div>
    <div class="detail-change detail-change-timezone">
    </div>
   </div>
  </div>
 </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="margin-left: 360px;">
      <!-- Modal content-->
      <div class="modal-content" style="width: 1400px;height: 800px;" >
            <div class="modal-body"  style='background-color: rgb(0, 102, 84);'>
            <div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="RoomStatusBar-1EZY">
                <div class="roomLogo-3vlp">
                   <a href="/" aria-label="Home">
                      <div class="newLogoWrapper-1HUR">
                            <img style="width: 100px;" src="https://tlus.edu.vn/wp-content/uploads/2018/06/LogoDHTL-300x300.png" alt="" srcset="">
                      </div>
                   </a>
                </div>
             </div>
        </div>
        <div class="col-md-4">
            <h3 style="color:#ffffff;position: absolute;
            top: 27%;
            left: -7%;">Chăm sóc khách hàng TLU</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h2 style="color:white">Video Của Bạn</h2>
            <video id='myVideo' muted="muted" style="border-radius: 10px;" width="100%" height="100%" controls autoplay> </video>
            <audio id = "localAudio"  autoplay></audio>
        </div>
        <div class="col-md-5">
            <h2 style="color:white">Video Khách hàng</h2>
            <video id='videoOnline' muted="muted" style="border-radius: 10px;" width="100%" height="100%" controls autoplay> </video>
            <!-- <audio id = "remoteAudio"  autoplay></audio>  -->
        </div>
        <div class="col-md-1"></div>

    </div>
</div>
<div class="container-fluid" style="position: absolute;bottom: 20px;">
    <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6" style="margin-left: -32px;">
                <button class="toggle-video" style="border-radius: 14px;width: 15%;">
                    <figure class="buttonFigure-2JAN" style="margin: 0px;">
                       <div class="jstest-button-icon-wrapper buttonIconWrapper-1-pZ isOff-a-I8">
                        <svg width="25%" height="25%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="BaseIcon-nykw BaseIcon--light-32mi BaseIcon--sized-2HpV">
                            <path clip-rule="evenodd" d="m11.4422 4h-4.88435-.00002c-.94429-.00001-1.71353-.00002-2.33805.05101-.64548.05273-1.22392.16492-1.76274.43946-.84673.43143-1.535138 1.11984-1.966568 1.96657-.27454.53882-.386728 1.11726-.4394654 1.76274-.05102602.62452-.05101716 1.39376-.05100628 2.33802v.0001 2.8843c-.00001088.9443-.00001974 1.7135.05100628 2.338.0527374.6455.1649254 1.2239.4394654 1.7628.43143.8467 1.119838 1.5351 1.966568 1.9665.53882.2746 1.11726.3868 1.76274.4395.62451.051 1.39372.051 2.33798.051h.00012 4.88422.0001c.9443 0 1.7135 0 2.338-.051.6455-.0527 1.2239-.1649 1.7628-.4395.8467-.4314 1.5351-1.1198 1.9665-1.9665.2746-.5389.3868-1.1173.4395-1.7628.0026-.032.0051-.0643.0074-.0971l4.4624 3.1874c.6618.4728 1.5812-.0003 1.5812-.8137v-12.11363c0-.81337-.9194-1.2865-1.5812-.81373l-4.4624 3.18737c-.0023-.03272-.0048-.06507-.0074-.09703-.0527-.64548-.1649-1.22392-.4395-1.76274-.4314-.84673-1.1198-1.53514-1.9665-1.96657-.5389-.27454-1.1173-.38673-1.7628-.43946-.6245-.05103-1.3937-.05102-2.338-.05101zm-8.07718 2.27248c.20988-.10693.49583-.18548 1.01762-.22812.53347-.04358 1.22077-.04436 2.21736-.04436h4.8c.9966 0 1.6839.00078 2.2174.04436.5218.04264.8077.12119 1.0176.22812.4704.23969.8528.62214 1.0925 1.09254.107.20988.1855.49583.2281 1.01762.0436.53347.0444 1.22077.0444 2.21736v2.8c0 .9966-.0008 1.6839-.0444 2.2174-.0426.5218-.1211.8077-.2281 1.0176-.2397.4704-.6221.8528-1.0925 1.0925-.2099.107-.4958.1855-1.0176.2281-.5335.0436-1.2208.0444-2.2174.0444h-4.8c-.99659 0-1.68389-.0008-2.21736-.0444-.52179-.0426-.80774-.1211-1.01762-.2281-.4704-.2397-.85285-.6221-1.09254-1.0925-.10693-.2099-.18548-.4958-.22812-1.0176-.04358-.5335-.04436-1.2208-.04436-2.2174v-2.8c0-.99659.00078-1.68389.04436-2.21736.04264-.52179.12119-.80774.22812-1.01762.23969-.4704.62214-.85285 1.09254-1.09254z" fill-rule="evenodd">
                            </path>
                        </svg>
                       </div>
                       <figcaption class="buttonLegend-D6Xt">Cam</figcaption>
                    </figure>
                 </button>
                <button class="button-volume" style="border-radius: 14px;width: 15%;">
                    <figure class="buttonFigure-2JAN" style="margin: 0px;">
                       <div class="" style="background-image: none;">
                        <svg  width="25%" height="25%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="BaseIcon-nykw BaseIcon--light-32mi BaseIcon--sized-2HpV"><path clip-rule="evenodd" d="m8 13c0 1.1046.89543 2 2 2h4c1.1046 0 2-.8954 2-2v-8c0-2.20914-1.7909-4-4-4-2.20914 0-4 1.79086-4 4zm-3-3.5c.55228 0 1 .44771 1 1v3.5c0 1.6569 1.34315 3 3 3h3 3c1.6569 0 3-1.3431 3-3v-3.5c0-.55229.4477-1 1-1s1 .44771 1 1v3.5c0 2.7614-2.2386 5-5 5h-2v3c0 .5523-.4477 1-1 1s-1-.4477-1-1v-3h-2c-2.76142 0-5-2.2386-5-5v-3.5c0-.55229.44772-1 1-1z" fill-rule="evenodd"></path>
                       </svg>
                       </div>
                       <figcaption class="buttonLegend-D6Xt">Mic</figcaption>
                    </figure>
                 </button>
                <button class="button-share" style="border-radius: 14px;width: 15%;">
                    <figure class="buttonFigure-2JAN" style="margin: 0px;">
                       <div class="buttonIconWrapper-1-pZ">
                          <svg width="25%" height="25%"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="BaseIcon-nykw BaseIcon--sized-2HpV BaseIcon--light-32mi">
                             <path clip-rule="evenodd" d="m16.4422 2h-8.88435-.00002c-.94429-.00001-1.71352-.00002-2.33805.05101-.64548.05273-1.22392.16492-1.76274.43946-.84673.43143-1.53514 1.11984-1.96657 1.96657-.27454.53882-.38673 1.11726-.43946 1.76274-.051029.62452-.051021 1.39376-.05101 2.33805v.00002 2.88435c-.000011.9443-.000019 1.7135.05101 2.338.05273.6455.16492 1.2239.43946 1.7628.43143.8467 1.11984 1.5351 1.96657 1.9665.53882.2746 1.11726.3868 1.76274.4395.62451.051 1.39372.051 2.33798.051h.00012 1.64212l-2.29017 2.8627c-.36666.4583-.04034 1.1373.54661 1.1373h9.08716c.5869 0 .9132-.679.5466-1.1373l-2.2902-2.8627h1.6421.0001c.9443 0 1.7135 0 2.338-.051.6455-.0527 1.2239-.1649 1.7628-.4395.8467-.4314 1.5351-1.1198 1.9665-1.9665.2746-.5389.3868-1.1173.4395-1.7628.051-.6245.051-1.3937.051-2.338v-2.88437c0-.94429 0-1.71353-.051-2.33805-.0527-.64548-.1649-1.22392-.4395-1.76274-.4314-.84673-1.1198-1.53514-1.9665-1.96657-.5389-.27454-1.1173-.38673-1.7628-.43946-.6245-.05103-1.3937-.05102-2.338-.05101zm-12.07718 2.27248c.20988-.10693.49583-.18548 1.01762-.22812.53347-.04358 1.22077-.04436 2.21736-.04436h8.8c.9966 0 1.6839.00078 2.2174.04436.5218.04264.8077.12119 1.0176.22812.4704.23969.8528.62214 1.0925 1.09254.107.20988.1855.49583.2281 1.01762.0436.53347.0444 1.22077.0444 2.21736v2.8c0 .9966-.0008 1.6839-.0444 2.2174-.0426.5218-.1211.8077-.2281 1.0176-.2397.4704-.6221.8528-1.0925 1.0925-.2099.107-.4958.1855-1.0176.2281-.5335.0436-1.2208.0444-2.2174.0444h-8.8c-.99659 0-1.68389-.0008-2.21736-.0444-.52179-.0426-.80774-.1211-1.01762-.2281-.4704-.2397-.85285-.6221-1.09254-1.0925-.10693-.2099-.18548-.4958-.22812-1.0176-.04358-.5335-.04436-1.2208-.04436-2.2174v-2.8c0-.99659.00078-1.68389.04436-2.21736.04264-.52179.12119-.80774.22812-1.01762.23969-.4704.62214-.85285 1.09254-1.09254z" fill-rule="evenodd"></path>
                          </svg>
                       </div>
                       <figcaption class="buttonLegend-D6Xt">Share</figcaption>
                    </figure>
                 </button>
                <button class="button-chat" style="border-radius: 14px;width: 15%;">
                    <figure class="buttonFigure-2JAN" style="margin: 0px;">
                       <div class="buttonIconWrapper-1-pZ">
                          <svg width="25%" height="25%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="BaseIcon-nykw BaseIcon--sized-2HpV BaseIcon--light-32mi">
                             <path clip-rule="evenodd" d="m14.6649 1.00001-.1649.00002h-4.99997l-.16486-.00002c-1.702-.000213-2.74433-.000346-3.63001.21795-2.7067.66715-4.820053 2.7805-5.487196 5.4872-.21829784.88568-.21816623 1.92802-.2179507 3.63004l.00001526.1648-.00001526.1649c-.00021553 1.702-.00034714 2.7443.2179507 3.63.667143 2.7067 2.780496 4.82 5.487196 5.4872.88568.2183 1.92802.2182 3.63002.2179h.16485 2.83337l4.6667 3.5c.824.618 2 .0301 2-1v-2.9288c2.3648-.8356 4.174-2.8095 4.782-5.2763.2183-.8857.2182-1.928.2179-3.63v-.1649-.1648c.0003-1.70203.0004-2.74436-.2179-3.63004-.6671-2.7067-2.7805-4.82005-5.4872-5.4872-.8857-.218296-1.928-.218163-3.63-.21795zm-.1649 2.00002c1.9188 0 2.6976.00732 3.3163.15982 1.9849.48924 3.5347 2.03903 4.0239 4.02394.1525.6187.1598 1.39746.1598 3.31621 0 1.9188-.0073 2.6976-.1598 3.3163-.4892 1.9849-2.039 3.5347-4.0239 4.0239-.6187.1525-1.3975.1598-3.3163.1598h-4.99997c-1.91878 0-2.69754-.0073-3.31624-.1598-1.98491-.4892-3.5347-2.039-4.02394-4.0239-.1525-.6187-.15982-1.3975-.15982-3.3163 0-1.91875.00732-2.69751.15982-3.31621.48924-1.98491 2.03903-3.5347 4.02394-4.02394.6187-.1525 1.39746-.15982 3.31624-.15982zm-5.10307 6.55746c-.24452-.49521-.84418-.69844-1.33939-.45392-.4952.24452-.69843.84418-.45391 1.33943.41247.8353 1.05013 1.5388 1.84107 2.0311.7909.4924 1.7037.7539 2.6353.7552.9317.0012 1.8452-.2578 2.6374-.7479.7923-.4902 1.4319-1.192 1.8467-2.0262.2458-.49452.0443-1.09474-.4503-1.34061-.4945-.24587-1.0947-.04429-1.3406.45025-.2489.50056-.6326.92156-1.108 1.21566-.4753.2941-1.0234.4495-1.5824.4488-.559-.0008-1.1067-.1577-1.5812-.4531-.4746-.2954-.85719-.7175-1.10467-1.21871z" fill-rule="evenodd"></path>
                          </svg>
                       </div>
                       <figcaption class="buttonLegend-D6Xt">Chat</figcaption>
                    </figure>
                 </button>
                <button class="button-leave" data-dismiss="modal" style="border-radius: 14px;width: 15%;">
                    <figure class="buttonFigure-2JAN" style="margin: 0px;">
                       <div class="buttonIconWrapper-1-pZ">
                          <svg width="25%" height="25%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="BaseIcon-nykw BaseIcon--sized-2HpV BaseIcon--meetingRed-3dxB">
                             <path clip-rule="evenodd" d="m17.9101 6.59611c-.0247-.33383-.0916-2.08992 1.2366-2.08992 1.4268 0 1.87 1.79068 1.8936 1.89027l.0021.00928c.0786.36578.1552.71979.2295 1.06277 1.5223 7.02979 2.0416 9.42819-2.1252 13.59499-4.3668 4.3668-11.17718 1.0918-17.08286-4.807-.01142-.0114-.02279-.0223-.03454-.0333-.17816-.1679-1.651682-1.61-.72652-2.5351.98353-.9836 2.63107.664 2.63107.664l1.76846 1.7684c.2721.2721.71326.2721.98535 0 .2721-.2721.2721-.7132 0-.9853l-4.49619-4.4963c-.0064-.0064-.01197-.0121-.01807-.0188-.10483-.1149-1.1329-1.28563-.30366-2.11491.87286-.87289 2.09098.3452 2.09102.34524l4.02075 4.02077c.27151.2715.71172.2715.98322 0 .27151-.2715.27151-.7117.00001-.9832l-5.72882-5.72898c-.02271-.02271-.0462-.04398-.07005-.0655-.21048-.18988-1.24151-1.20799-.29439-2.1551.9428-.94281 1.94711.08338 2.14183.30209.02326.02613.04613.0516.07087.07634l5.46322 5.46317c.2837.28368.7437.28368 1.0274 0 .2837-.28371.2837-.74369 0-1.02741l-4.29008-4.29007c-.02347-.02347-.04761-.04527-.07235-.0674-.20963-.18753-1.20576-1.16121-.34132-2.02562.96128-.96124 2.17921.25659 2.17943.25681l.00001.00001 7.09461 7.09461c.6196.61965 1.6797.19919 1.7054-.67679.03-1.02642.0594-2.06518.0638-2.34063.0006-.03652-.0015-.07099-.0042-.10742zm-1.7613 5.81959c.2202-.1667.2635-.4803.0968-.7004-.1667-.2202-.4803-.2635-.7005-.0968-1.7516 1.3265-3.116 4.2243-1.8491 7.7871.0925.2602.3784.3962.6386.3036.2602-.0925.3961-.3784.3036-.6386-1.1199-3.1495.1045-5.5901 1.5106-6.6549z" fill-rule="evenodd"></path>
                          </svg>
                       </div>
                       <figcaption class="buttonLegend-D6Xt">Leave</figcaption>
                    </figure>
                 </button>
            </div>
            <div class="col-md-2"></div>
                </div>
            </div>
            </div>

      </div>
    </div>
  </div>
@endsection
@section('jsScript')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var socket = io.connect("http://18.183.81.183:9000/")
    </script>
    <script scope src="{{ asset('chat/chat.js') }}"> </script>
@endsection
