<div x-data="{
    query: '{{request('search', '')}}'
}" class="axil-single-widget widget widget_search mb--30">

    <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">Search</h5>


    <div class="axil-search form-group">
        <button x-on:click="$dispatch('search',{
            search : query
        })" id="searchBlog" class="search-button" style="background-color: #dcdcdc; border-radius: 50px; width:50px; margin-left: -7px; height:30px;" onMouseOver="this.style.background='white'"
                onMouseOut="this.style.background='#dcdcdc'"><i
                class="fal fa-search"></i></button>

        <input x-model="query" type="text" class="form-control" placeholder="Search" style="padding-left: 77px; height:45px;">
    </div>

</div>
