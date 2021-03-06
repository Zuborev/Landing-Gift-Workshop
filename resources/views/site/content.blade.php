@if(isset($pages) && is_object($pages))

    @foreach($pages as $k=>$page)
       @if($k%2 == 0)
           <section id="{{$page->alias}}" class="top_cont_outer">
               <div class="hero_wrapper">
                   <div class="container">
                       <div class="hero_section">
                           <div class="row">
                               <div class="col-lg-5 col-sm-7">
                                   @if(session('success'))
                                       <div class="alert alert-success" role="alert" id="true">
                                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                               <span aria-hidden="true">x</span>
                                           </button>
                                           {{ session()->get('success') }}
                                       </div>
                                   @endif
                                   @if($errors->any())
                                           @foreach($errors->all() as $error)
                                               <div class="alert alert-danger" role="alert" id="true">
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span aria-hidden="true">x</span>
                                                   </button>
                                                   {{ $error }}
                                                   </div>
                                           @endforeach
                                   @endif
                                   <div class="top_left_cont zoomIn wow animated">
                                       {!! $page->text !!}
                                       <a href="{{ route('pages', $page->alias) }}" class="read_more2">Наша Галерея</a> </div>
                               </div>
                               <div class="col-lg-7 col-sm-5">
                                   <img src="/img/{{ $page->images }}">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <!--Hero_Section-->
       @else
           <section id="{{$page->alias}}"><!--Aboutus-->
               <div class="inner_wrapper">
                   <div class="container">
                       <br>
                       <h2>{{$page->name}}</h2>
                       <div class="inner_section">
                           <div class="row">
                               <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><img class="img-circle delay-03s animated wow zoomIn" src="/img/{{$page->images}}"></div>
                               <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                   <div class=" delay-01s animated fadeInDown wow animated">
                                       {!! $page->text !!}
                                   </div>
                                   <div class="work_bottom"> <span>Хотели бы знать больше..</span> <a href="#contact" class="contact_btn">Напишите нам</a> </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <!--Aboutus-->
       @endif
    @endforeach
@endif

@if(isset($services) && is_object($services))

    <!--Service-->
    <section  id="service">
        <div class="container">
            <h2>Услуги</h2>
            <div class="service_wrapper">

                @foreach($services as $k=>$service)
                    @if($k == 0 || $k%3 == 0)
                        <div class="row {{($k != 0) ? 'borderTop' : '' }}">
                    @endif
                            <div class="col-lg-4">
                            <div class="service_block {{($k%3 > 0) ? 'borderLeft' : '' }} {{ ($k > 2) ? 'mrgTop' : ''}}">
                                <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon }}"></i></span> </div>
                                <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
                                <p class="animated fadeInDown wow">{!!  $service->text !!}</p>
                            </div>
                            </div>
                    @if(($k+1)%3 ==0)
                            </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
    <!--Service-->

@endif

@if(isset($portfolios))
    <!-- Portfolio -->
    <section id="Portfolio" class="content">

        <!-- Container -->
        <div class="container portfolio_title">

            <!-- Title -->
            <div class="section-title">
                <h2>Подарки & Поделки</h2>
            </div>
            <!--/Title -->

        </div>
        <!-- Container -->

        <div class="portfolio-top"></div>

        <!-- Portfolio Filters -->
        <div class="portfolio">

            @if(isset($tags) && is_object($tags))
                <div id="filters" class="sixteen columns">
                    <ul class="clearfix">
                        <li><a id="all" href="#" data-filter="*" class="active">
                                <h5>Все</h5>
                            </a></li>
                        @foreach($tags as $tag)
                            <li><a class="" href="#" data-filter=".{{$tag}}">
                                    <h5>{{$tag}}</h5>
                                </a></li>
                        @endforeach
                    </ul>
                </div>
                <!--/Portfolio Filters -->
            @endif

            <!-- Portfolio Wrapper -->
            <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">

                @foreach ($portfolios as $item)
                    <!-- Portfolio Item -->
                        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{$item->filter}} isotope-item">
                            <div class="portfolio_img"><img src="/img/{{$item->images}}" alt = "{{$item->name}}"></div>
                            <div class="item_overlay">
                                <div class="item_info">
                                    <h4 class="project_name">{!! $item->name !!}</h4>
                                </div>
                            </div>
                        </div>
                        <!--/Portfolio Item -->
                @endforeach
            </div>
            <!--/Portfolio Wrapper -->
        </div>
        <!--/Portfolio Filters -->
        <div class="portfolio_btm"></div>
        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>
    </section>
    <!--/Portfolio -->
@endif

@if(isset($employees) && is_object($employees))
    <section class="page_section team" id="team"><!--main-section team-start-->
        <div class="container">
            <h2>Наша Команда</h2>
            <h6>Мы молоды, но амбициозны.</h6>
            <div class="team_section clearfix">

                    @foreach($employees as $k=>$employee)
                    <div class="team_area">
                        <div class="team_box wow fadeInDown delay-0{{ ($k*3+3) }}s">
                            <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                            <img src="/img/{{$employee->images}}" alt = "{{$employee->name}}">
                            <ul>
                                <li><a href="{{$employee->instagram_link}}" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                        <h3 class="wow fadeInDown delay-0{{ ($k*3+3) }}s">{{ $employee->name }}</h3>
                        <span class="wow fadeInDown delay-0{{ ($k*3+3) }}s"> {{ $employee->position }}</span>
                        <p class="wow fadeInDown delay-0{{ ($k*3+3) }}s">{{ $employee->text }}</p>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--/Team-->
@endif

<!--Footer-->
<footer class="footer_wrapper" id="contact">
    <div class="container">
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>Контакты</h2>
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>Наша мастерская</h4>
                            <p>г.Харьков, пр.Гагарина, 20</p>
                        </div>
                        <div class="detail">
                            <h4>Наш телефон</h4>
                            <p>+38 096 191 36 53</p>
                        </div>
                        <div class="detail">
                            <h4>Наша почта</h4>
                            <p>workshop.kh@gmail.com</p>
                        </div>
                    </div>

                    <ul class="social_links">

                        <li class="instagram animated bounceIn wow delay-02s"><a href="https://www.instagram.com/the_gift_workshop"><i class="fa fa-instagram"></i></a></li>
                        <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                        <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                        <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>

                    </ul>
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">

                    <form action = "{{route('send')}}" method = "POST">
                        @csrf
                        <input class="input-text" type="text" name="name" placeholder="Введите ваше имя" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" required>
                        <input class="input-text" type="text" name="phone" placeholder="Введите ваш телефон" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" required>
                        <input class="input-text" type="text" name="email" placeholder="Введите вашу почту" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" required>
                        <textarea class="input-text text-area" name="text" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">Введите ваше сообщение</textarea>
                        <input class="input-btn" type="submit" value="отправить">
                    </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="footer_bottom"><span>Copyright © 2020,    Site by <a href="/">Zuborev</a> </span> </div>
    </div>
</footer>
