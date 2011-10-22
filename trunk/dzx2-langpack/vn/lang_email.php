<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_email.php by vituocgia http://we.ecms.asia/ $
 */


$lang = array
(
	'hello' => 'Xin chào',
	'moderate_member_invalidate' => 'Không duyệt',
	'moderate_member_delete' => 'Xóa',
	'moderate_member_validate' => 'Duyệt!',


	'get_passwd_subject' =>		'Trợ giúp lấy lại mật khẩu',
	'get_passwd_message' =>		'
<p>{username}, 
Thư được gửi bởi {bbname}.</p>

<p>Bạn nhận được email thông báo này vì bạn hoặc ai đó đã sử dụng chức năng lấy lại mật khẩu trên website.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Quan trọng!</strong><br />
----------------------------------------------------------------------</p>

<p>Nếu không phải bạn là người gửi yêu cầu thay đổi mật khẩu, vui lòng bỏ qua và xóa email này. Nếu không bạn vui lòng đọc và làm theo chỉ dẫn để lấy lại mật khẩu</p>
<p>
----------------------------------------------------------------------<br />
<strong>Hướng dẫn lấy lại mật khẩu</strong><br />
----------------------------------------------------------------------</p>
</p>
Trong vòng ba ngày bạn phải click vào liên kết dưới đây để thiết đặt lại mật khẩu của bạn: <br />

<a href="{siteurl}member.php?mod=getpasswd&uid={uid}&id={idstring}" target="_self">{siteurl}member.php?mod=getpasswd&uid={uid}&id={idstring}</a>
<br />
(Nếu liên kết không mở ra trong trang mới bạn hãy tự copy bằng tay rồi dán lên thanh địa chỉ của trình duyệt)</p>

<p>Sau khi mở trang web bạn hãy nhập mật khẩu mới, sau đó sử dụng mật khẩu mới để đăng nhập, khi đó bạn có thể thay đổi mật khẩu bất cứ khi nào..</p>

<p>Yêu cầu được gửi từ IP {clientip}</p>


<p>
Trân trọng<br />
</p>
<p>Đội ngũ quản trị {bbname}.
{siteurl}</p>',


	'email_verify_subject' =>	'Xác nhận địa chỉ email',
	'email_verify_message' =>	'
<p>{username}, 
Thư được gửi từ {bbname}.</p>

<p>Bạn nhận được tin nhắn này vì bạn hoặc ai đó đã gửi yêu cầu sửa đổi email đang sử dụng, nếu bạn chưa truy cập diễn đàn hoặc không gửi email yêu cầu vui lòng bỏ qua và xóa thông báo này. Bạn không cần bỏ email thông báo hoặc làm gì cả.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Chỉ dẫn kích hoạt tài khoản</strong><br />
----------------------------------------------------------------------<br />

<p>Bạn là người mới tham gia diễn đàn của chúng tôi, hoặc bạn muốn sửa đổi địa chỉ email.  Hệ thống cần xác minh địa chỉ của bạn giúp tránh bạn bị lạm dụng và tránh gửi thư rác.</p>

<p>Bạn chỉ cần nhấn vào liên kết dưới đây để kích hoạt tài khoản: <br />

<a href="{url}" target="_self">{url}</a>
<br />
(Nếu liên kết không mở ra trong trang mới bạn hãy tự copy bằng tay rồi dán lên thanh địa chỉ của trình duyệt)</p>

<p>Cảm ơn bạn đã ghé thăm, chúc bạn luôn vui vẻ hanh phúc!</p>


<p>
Trân trọng<br />

Nhóm quản trị {bbname}.<br />
{siteurl}</p>',

	'add_member_subject' =>		'Đăng ký thành viên tại website',
	'add_member_message' => 	'
{newusername} , 
Thư được gửi bởi {bbname}.

Tôi là {adminusername} , thuộc đội ngũ quản trị {bbname}, bạn nhận được email này vì bạn đã đăng ký  thành viên tại diễn đàn chúng tôi. Bạn đã sử dụng địa chỉ email này để đăng ký.

----------------------------------------------------------------------
Quan trọng!
----------------------------------------------------------------------

Nếu như bạn không quan tâm đến diễn đàn của chúng tôi hoặc không có ý định trở thành thành viên, vui lòng bỏ qua email này.

----------------------------------------------------------------------
Thông tin tài khoản
----------------------------------------------------------------------

Tên diễn đàn: {bbname}
Địa chỉ diễn đàn: {siteurl}

Username: {newusername}
Mật khẩu: {newpassword}

Từ bây giờ bạn có thể đăng nhập vào diễn đàn bằng tài khoản đã đăng ký, có nhiều điều thú vị đang chờ bạn!



Trân trọng

Nhóm quản trị {bbname}.
{siteurl}',


	'birthday_subject' =>		'Chúc mừng sinh nhật bạn',
	'birthday_message' => 		'
{username}, 
Thư được gửi bởi {bbname}.

Bạn nhận được thư vì bạn đã đăng ký thành viên tại website chúng tôi với email này. Và theo thông tin điền vào thì hôm nay là sinh nhật của bạn, thay mặt cho đội ngũ quản lý diễn đàn chúc bạn có một sinh nhật vui vẻ hạnh phúc.

Nếu bạn không phải thành viên hoặc hôm nay không phải sinh nhật của bạn chúng tôi xin lỗi vì email này có thể đã bị lạm dụng. Địa chỉ email này của bạn sẽ không nhận được tin nhắn lặp lại nữa (nếu bạn nhập sai sinh nhật), vui lòng bỏ qua email này.



Trân trọng

Nhóm quản trị {bbname}.
{siteurl}',

	'email_to_friend_subject' =>	'{$_G[member][username]} Đề tài nên xem: $thread[subject]',
	'email_to_friend_message' =>	'Email này được gửi bởi {$_G[member][username]} tại diễn đàn {$_G[setting][bbname]}.

Bạn nhận được email này vì thành viên {$_G[member][username]} tại {$_G[setting][bbname]} sử dụng chức năng "Gửi email cho bạn bè" để gửi đề tài cho bạn. Nếu bạn không có hứng thú vui lòng bỏ qua email này, bạn không cần phải hủy thông báo hoặc thực hiện thao tác khác.

----------------------------------------------------------------------
Phần đầu đoạn thư gốc
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Phần kết đoạn thư gốc
----------------------------------------------------------------------

Vui lòng lưu ý rằng thư này được gửi bởi thành viên, sử dụng chức năng "Gửi cho bạn bè" chứ không phải là email chính thức từ diễn đàn. Nhóm quản trị sẽ phản hồi cho các tin nhắn đó.

Chào mừng bạn đến với {$_G[setting][bbname]}
$_G[siteurl]',

	'email_to_invite_subject' =>	'Bạn của bạn là {$_G[member][username]} đã gửi mã mời đăng ký tại {$_G[setting][bbname]} cho bạn',
	'email_to_invite_message' =>	'
$sendtoname,
Email này được gửi bởi {$_G[member][username]} tại diễn đàn {$_G[setting][bbname]}.

Bạn nhận được email này vì tài khoản {$_G[member][username]} đã sử dụng chức năng "Gửi mã mời cho bạn bè" tại website để gửi cho bạn. Nếu bạn không có hứng thú, vui lòng bỏ qua email này, bạn không cần phải hủy nhận thông báo hoặc các thao tác khác.

----------------------------------------------------------------------
Phần đầu đoạn thư gốc
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Phần kết đoạn thư gốc
----------------------------------------------------------------------

Vui lòng chú ý thư này được gửi bởi thành viên, sử dụng chức năng "Gửi mã mời cho bạn bè", không phải email chính thức từ hệ thống. Nhóm quản trị sẽ phản hồi cho từng email này.

Chào mừng bạn đến với {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject' =>	'Thông báo kết quả xét duyệt thành viên',
	'moderate_member_message' =>	'
<p>{username} , 
Thư được gửi bởi {bbname}.</p>

<p>Bạn nhận được thư này vì email này được sử dụng để đăng ký thành viên mới t ại diễn đàn. Ban quản trị cần xét duyệt tài khoản của bạn trước khi đưa vào sử dụng, vui lòng kiểm tra email thường xuyên và xem kết quả kiểm duyệt.</p>

----------------------------------------------------------------------<br />
<strong>Thông tin đăng ký và kết quả xét duyệt</strong><br />
----------------------------------------------------------------------<br />

Username: {username}<br />
Ngày tham gia: {regdate}<br />
Thời gian gửi: {submitdate}<br />
Tần số gửi: {submittimes}<br />
Đăng ký tại: {message}<br />
<br />
Kết quả duyệt: {modresult}<br />
Thời gian duyệt: {moddate}<br />
Người duyệt: {adminusername}<br />
Quản lý tin nhắn: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Kết quả xét duyệt của bạn</strong><br />
----------------------------------------------------------------------<br />

<p>Kết quả: Thông tin đăng ký của bạn đã được xét duyệt, bạn đã trở thành thành viên chính thức.</p>

<p>Bị từ chối: Thông tin đăng ký của bạn chưa hoàn thiện, hoặc thiếu những thông tin cần thiết, bạn có thể vào phần quản lý thông tin, <a href="home.php?mod=spacecp&ac=profile" target="_self">Hoàn thiện thông tin đăng ký</a>, sau đó bạn sẽ được duyệt.</p>

<p>Đã xóa: Thông tin yêu cầu đăng ký của bạn quá lớn, hoặc do số lượng thành viên đăng ký quá lớn khiến hệ thống lỗi. Ứng dụng đã bị từ chối hoàn toàn, tài khoản của bạn đã bị xóa khỏi dữ liệu, vui lòng không đăng nhập hoặc gửi thông tin. Hãy hiểu cho chúng tôi.</p>

<br />
<br />
Trân trọng<br />
<br />
Nhóm quản trị {bbname}.<br />
{siteurl}',

	'adv_expiration_subject' =>	'Quảng cáo của bạn sẽ hết hạn ngày {day}, vui lòng hồi đáp',
	'adv_expiration_message' =>	'Những quảng cáo dưới đây sẽ hết hạn sau {day} ngày nữa, hãy để ý thời gian để hồi đáp: <br /><br />{advs}',
	'invite_payment_email_message' => '
Chào mừng {bbname}({siteurl}), đơn hàng số {orderid} đã thanh toán thành công, đơn hàng đã hoàn thành.<br />
<br />----------------------------------------------------------------------<br />
Đây là mã mời mà bạn nhận được
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Quan trọng!
<br />----------------------------------------------------------------------<br />',
);

?>