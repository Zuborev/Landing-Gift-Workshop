<div class="container portfolio_title">
    <div class="section-title">
        <h2>{{$title}}</h2>
    </div>
</div>
<div class="portfolio">
    <div id="filters" class="sixteen columns">
        <ul style="padding:0px 0px 0px 0px">
            <li><a  href="{{route('pagesAll')}}">
                    <h5>Страницы</h5>
                </a>
            </li>
            <li><a  href="{{route('portfolios.index')}}">
                    <h5>Портфолио</h5>
                </a>
            </li>
            <li><a href="{{route('services.index')}}">
                    <h5>Сервисы</h5>
                </a>
            </li>
            <li><a href="{{route('galleries.index')}}">
                    <h5>Галерея</h5>
                </a>
            </li>
            <li><a href="{{route('employees.index')}}">
                    <h5>Команда</h5>
                </a>
            </li>
        </ul>
    </div>

</div>
