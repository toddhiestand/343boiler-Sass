<?php
/*
Template Name: Calendar
*/

// initiallize events array
$events = array();

// get community events
foreach($upcoming->group_getEvents('16788', array('eventsPerPage' => 20)) as $event) {
  $event->type = 'community';
  $event->start_timestamp = strtotime($event->start_date.' '.$event->start_time);
  $sortable_key = $event->start_timestamp.'-'.$event->id;
  $events[$sortable_key] = $event;
}

// add ovc events
foreach($upcoming->group_getEvents('16789', array('eventsPerPage' => 20)) as $event) {
  $event->type = 'ovc';
  $event->start_timestamp = strtotime($event->start_date.' '.$event->start_time);
  $sortable_key = $event->start_timestamp.'-'.$event->id;
  $events[$sortable_key] = $event;
}

// sort the array by the timestamped key
ksort($events);

get_header();

the_post();

?>
<div id="sidebar" class="column sidebar">
  
  <div id="calendar-nav" class="submenu aside">
    <ul>
      <li class="all"><a href="#all">All Events</a></li>
      <li class="ovc"><a href="#ovc">One Village Events</a></li>
      <li class="community"><a href="#community">Community Events</a></li>
    </ul>
  </div>
  
  <?php include(TEMPLATEPATH.'/_social_links.php'); ?>
  
  <?php include(TEMPLATEPATH.'/_say-hi.php'); ?>
  
</div>

<div id="main" class="column">
	<div id="post-<?php the_ID(); ?>" class="post section">
    <div class="header">
      <h1 class="title"><?php the_title(); ?></h1>
    </div>
    <div id="event-list" class="content">
      <p class="which">All Events</p>
      <ol class="all">
        <?php foreach ($events as $event) : ?>
          <li id="<?php echo $event->type; ?>-<?php echo $event->id; ?>" class="event <?php echo $event->type; ?>">
            <?php //echo('<pre>'); print_r($event); echo('</pre>'); ?>
            <div class="date left">
              <span class="month"><?php echo date('M', $event->start_timestamp); ?></span>
              <span class="day"><?php echo date('j', $event->start_timestamp); ?></span>
            </div>
            <div class="info right">
              <h3 class="name"><a href="http://upcoming.yahoo.com/event/<?php echo $event->id; ?>/"><?php echo $event->name; ?></a></h3>
              <div class="time-loc">
                <span class="time"><?php echo date('g:ia', $event->start_timestamp); ?></span> @ <span class="venue-name"><?php echo $event->venue_name; ?></span><br/>
                <span class="venue-address"><?php echo $event->venue_address; ?>, <?php echo $event->venue_city; ?> <?php echo strtoupper($event->venue_state_code); ?> <?php echo $event->venue_zip; ?></span>
              </div>
              <div class="description"><?php echo $event->description; ?></div>
              <div class="more">
                <a class="more-link" href="http://upcoming.yahoo.com/event/<?php echo $event->id; ?>/"><strong>More Info</strong></a>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
</div>

<?php get_footer(); ?>
