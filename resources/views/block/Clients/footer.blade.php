@php
$Categories = DB::table('Categories')
    ->whereNotIn('name', ['nam', 'nữ', 'không xác định'])
    ->limit(6)
    ->get();
@endphp
<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Liên kết</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('help') }}">Chính sách</a></li>
                        <li><a href="{{ route('help') }}">Giúp đỡ</a></li>
                        <li><a href="{{ route('account') }}">Tài khoản</a></li>
                        <li><a href="{{ route('blog.all') }}">Bài viết</a></li>
                        <li><a href="{{ route('contract') }}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Danh mục</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        @foreach ($Categories as $cate)
                        <li><a href="{{ route('categories', ['idc'=>'nam','id'=>$cate->name]) }}">{{ $cate->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_3">Liên hệ</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>Công Viên Phần Mềm Quang Trung FPT Polytechnic</li>
                        <li><i class="ti-headphone-alt"></i>0353681506</li>
                        <li><i class="ti-email"></i><a href="mailto:nghinvps23655@fpt.edu.vn">nghinvps23655@fpt.edu.vn</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_4">Cập nhật tin tức</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Email của bạn">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Theo dõi chúng tôi</h5>
                        <ul>
                            <ul>
                                <li><a href="#0"><i class="fa-brands fa-twitter" style="color: blue"></i></a></li>
                                <li><a href="https://www.facebook.com/Nghi.1110.2003/"><i class="fa-brands fa-facebook" style="color: #3b5998"></i></a></li>
                                <li><a href="https://www.instagram.com/nghi7787/"><i class="fa-brands fa-instagram" style="color:  #e4405f;"></i></a></li>
                                <li><a href="#0"><i class="fa-brands fa-youtube" style="color: #ff0000;"></i></a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="Vietnamese" selected>Vietnamese</option>
                                <option value="English">English</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="VND" selected>VND</option>
                                <option value="US Dollar">US Dollars</option>
                            </select>
                        </div>
                    </li>
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="{{ route('help') }}">Điều khoản và điều kiện</a></li>
                    <li><a href="{{ route('help') }}">Chính sách</a></li>
                    <li><span>© 2023 VnSneaker</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
