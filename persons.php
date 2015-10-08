
<header>
  <nav class="main">
    <ul>
      <li><a href="#">თავფურცელი</a></li>
      <li><a href="#">სიახლეები</a></li>
      <li class="active"><a href="#">ბაზა</a></li>
      <li><a href="#">კონტაქტი</a></li>
    </ul>
  </nav>
</header>

<section class="filter-ctgr">
  <?php foreach ($alphabet as $letter) { ?>
    <a href="#"><?= $letter->letter ?></a>
  <?php } ?>
    <!--<a href="#">ა</a><a href="#">ბ</a><a href="#">გ</a><a href="#">დ</a><a href="#">ე</a><a href="#">ვ</a><a href="#">ზ</a><a href="#">თ</a><a href="#">ი</a><a href="#">კ</a><a href="#">ლ</a><a href="#">მ</a><a href="#">ნ</a><a href="#">ო</a><a href="#">პ</a><a href="#">ჟ</a><a href="#">რ</a><a href="#">ს</a><a href="#">ტ</a><a href="#">უ</a><a href="#">ფ</a><a href="#">ქ</a><a href="#">ღ</a><a href="#">ყ</a><a href="#">ჰ</a>-->
</section>

<div id="sub-menu" class="sub-menu mini"><!-- mini -->
  <div class="menu-icons">
      <div class="icn-nav"> <span></span> <span></span> <span></span></div>
 </div>
  <nav class="sub">
      <a class="active" href="პირი">
        <div class="icn"><img src="<?= base_url(); ?>assets/svg/people.svg"><div class="arrow"></div></div>
        <h4>პირი</h4><h3>პირთა ანბანური საძიებელი</h3>
        <div class="bg"></div>
      </a>
      <a href="ფაქტი">
        <div class="icn"><img src="<?= base_url(); ?>assets/svg/eye.svg"><div class="arrow"></div></div>
        <h4>ფაქტი</h4><h3>ძიება ფაქტოიდების ბაზაში</h3>
        <div class="bg"></div>
      </a>
      <a href="წყარო">
        <div class="icn"><img src="<?= base_url(); ?>assets/svg/fact.svg"><div class="arrow"></div></div>
        <h4>წყარო</h4><h3>წყაროს ტიპი, დაცულია</h3>
        <div class="bg"></div>
      </a>
      <a href="ადგილი">
        <div class="icn"><img src="<?= base_url(); ?>assets/svg/place.svg"><div class="arrow"></div></div>
        <h4>ადგილი</h4>
        <h3>რუკაზე დატანილი ფაქტები</h3>
        <div class="bg"></div>
      </a>
    </ul>
  </nav>
</div>

<section id="filter-srch" class="menu-collapsed filter-srch"><!--  menu-collapsed -->
  <form id="search" class="active clearfix" method="get">
      <input type="search" name="key" class="search" aria-controls="person" placeholder="ძიება" id="search_form_input">
      <button class="search-button" type="submit"><img src="<?= base_url(); ?>assets/svg/search.svg"></button>
    </form>
  <div class="scroll">
  <?php foreach($person as $persons) { ?>
    <h2 class="<?= $persons->person_id == $this->uri->segment(3) ? 'active' : ''?>"><a href="<?= base_url(); ?>persons/person/<?= $persons->person_id?>/<?= $persons->factoid_id ?>/<?= $persons->alphabet_id ?>"><?= $persons->person_name ?><?= $persons->person_id ?></a></h2>
  <?php } ?>
</div>
</section>

<main class="detailed">
 <article>
   <div class="persons view clearfix">
     <?php if($infoDetailed->src) { ?>
     <div class="img persons"><img src="<?= base_url(); ?>uploads/<?= $infoDetailed->src?>"></div>
     <?php } ?>

     <div class="header <?=  $margin ?>">
       <h1 ><?= $infoDetailed->person_name ?></h1>
       <h2><?= $infoDetailed->person_occupation ?></h2>
    </div>

    <div class="cntnt">
      <p><?= $filterFactoid[0]->factoid_txt ?></p><br/>
    </div>

    <section class="filter-cntnt">
      <ul>
         <?php $currentCat = false;
         foreach ($factoids as $report) :
             if ($currentCat !== $report->factoid_type_id) :  ?>
         <li class="h3 <?= $report->factoid_id == $this->uri->segment(4) ? 'active' : ''?>"><?php echo ($report->factoid_type_name);?></li><span></span>
         <?php
             $currentCat = $report->factoid_type_id;
             endif;
         ?>

         <li class="txt"><a class="active" href="<?= base_url(); ?>persons/person/<?php echo $this->uri->segment(3) ?>/<?= $report->factoid_id ?>"><?= (preg_replace('/\s+?(\S+)?$/', '', substr($report->factoid_txt, 0, 80)));?>...</a></li>
         <?php endforeach;

         if ($currentCat) :
                 echo '</ul>';
        endif
         ?>
      </ul>
   </section>

   <section class="sources">
     <span>წყარო:</span>&nbsp;<?= $filterFactoid[0]->source_name?><br/>
     <span>წყაროს ტიპი:</span>&nbsp;<?= $filterFactoid[0]->source_type_name?><br/>
     <span>გამოცემის ადგილი:</span>&nbsp;<?= $filterFactoid[0]->pub_place?><br/>
     <span>ენა:</span>&nbsp;<?= $filterFactoid[0]->lang?><br/>
     <span>დაცულია:</span>&nbsp;<?= $filterFactoid[0]->authority_name?><br/><br/><br/><br/>
 </section>
 <section>
   <h5>სხვა პირები ამ ფაქტიდან</h5>
   <?php  foreach ($factoids as $report) { ?>
     <?php
    //echo  $report->factoid_persons
      //$echo = rtrim(implode(',', $report->persons), ',');
      //$string = implode(',', $report->factoid_type_id);

      //ehco $echo
      $values = explode(',',$report->persons);
      if( count($values)){
          foreach($values as $value){

              echo trim($value);

          }

      }
echo $report->person_name

      ?>
  <?php } ?>
 </section>
  </div> <!-- end first content -->
 </article>
</main>
