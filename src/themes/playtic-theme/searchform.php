<form action="<?php echo home_url('/');?>" id="searchForm" class="global-frm-search">
    <div class="input-group mb-3">

      <input  type="text"
              name="s" 
              require 
              placeholder="Search"  
              id="searchFormInput"
              value="<?php the_search_query(); ?>"  
              class="form-control control-search"  
              aria-label="Search" 
              aria-describedby="Search Form">

      <button class="btn btn-primary" 
              type="submit" 
              title="Search Posts"
              id="searchFormButton">
              <i class="fas fa-search white_text"></i>
              <?php echo esc_attr_x( ' ', 'submit button' ) ?> 
      </button>

    </div>

</form>