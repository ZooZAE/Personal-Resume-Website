<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="./liu.png" alt="">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }} </p>
        </div>
    </div>

    <ul class="app-menu">
        <li class="app-menu__header">Dashboard</li>
        <li><a class="app-menu__item {{ Nav::isRoute('manage.dashboard') }}" href="{{ route('manage.dashboard') }}"><i
                    class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('user') }}" href="{{ route('manage.user.profile') }}"><i
                    class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">Profile</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('education') }}" href="{{ route('manage.education.index') }}"><i
                    class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Education</span></a>
        </li>

        <li><a class="app-menu__item {{ Nav::isResource('skill') }}" href="{{ route('manage.skill.index') }}"><i
                    class="app-menu__icon fa fa-sliders"></i><span class="app-menu__label">Skill</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('language') }}" href="{{ route('manage.language.index') }}"><i
                    class="app-menu__icon fa fa-language"></i><span class="app-menu__label">Language</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('certificate') }}"
                href="{{ route('manage.certificate.index') }}"><i class="app-menu__icon fa fa-certificate"></i><span
                    class="app-menu__label">Certificate</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('experience') }}"
                href="{{ route('manage.experience.index') }}"><i class="app-menu__icon fa fa-briefcase"></i><span
                    class="app-menu__label">Experience</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('social') }}" href="{{ route('manage.social.index') }}"><i
                    class="app-menu__icon fa fa-thumbs-up"></i><span class="app-menu__label">Social Links</span></a>
        </li>

        <li><a class="app-menu__item {{ Nav::isResource('interest') }}" href="{{ route('manage.interest.index') }}"><i
                    class="app-menu__icon fa fa-bed"></i><span class="app-menu__label">Interest</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('project') }}" href="{{ route('manage.project.index') }}"><i
                    class="app-menu__icon fa fa-bandcamp"></i><span class="app-menu__label">Projects</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('setting') }}" href="{{ route('manage.setting.index') }}"><i
                    class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Settings</span></a></li>
    </ul>
</aside>

{{-- {{ Nav::isRoute('manage.dashboard') }} --}}
