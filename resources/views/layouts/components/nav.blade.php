<nav class='main-nav'>
    <ul class='nav-list left'>
    	<li class='nav-brand'>
    		<a href='{{pl('/')}}'>
    			ЗНО-Клуб
    		</a>
    	</li>
    	<li>
    		<a href='{{pl('/posts')}}'>
    			Статті
    		</a>
    	</li>
    	<li>
    		<a href='{{pl('/forum')}}'>
    			Форум
    		</a>
    	</li>
    	<li>
    		<a href='{{pl('/info')}}'>
    			Інформація
    		</a>
    	</li>
    </ul>
    <ul class='nav-list right'>
        
            @if(checkUser())
            <li class='nav-profile--droptarget'>
                <a href="#">
                    <div class='nav-profile--avatar'>
                        <img src="{{pl(_GU()->avatar)}}" alt="_" title="{{_GU()->name}}">
                        
                    </div>
                </a>
                <i class="caret"></i>
                <ul class="nav-profile--dropdown">
                    <li>
                        <a href="{{pl("/profile")}}">
                            Профіль
                        </a>
                        
                    </li>
                    <li>    
                        <a href="{{pl("/profile/settings")}}">
                            Налаштування
                        </a>
                    </li>
                    <li>   
                        <a href="{{pl("/logout")}}">
                            Вийти
                        </a>
                    </li>
                </ul>
            </li>
            @else
            <li>
                <a href='{{pl("/signup")}}'>
                    Вхід та реєстрація
                </a>
            </li>
            @endif
    </ul>
</nav>