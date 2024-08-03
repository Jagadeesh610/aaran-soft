<div>

{{--    <x-sports.slider.homeslidesports :list="$list" :title="$title"/>--}}

    <x-slider.home :list="$list"/>

    <!-- Recent Activities -->
    <x-sports.design.activities :list="$activities"/>
    <!-- Menu -1 (optional) -->
    <x-sports.menu.menu-1 />
    <!-- Gallery -->
    <!-- demo -->
    <x-sports.design.gallery :clubImage="$clubImage" />
    <!-- Achievement -->
    <x-sports.design.achievement :image="$achievements" />
    <!-- Blog -->
    <!-- Latest News -->
    <x-sports.design.latest :events="$events" :up-coming-events="$upComingEvents" :blogs="$blogs" :news="$news" :moments="$moments"/>

</div>
