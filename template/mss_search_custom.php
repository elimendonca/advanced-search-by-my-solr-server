<?php
/*
Template Name: Search
*/

function spanOrder($sort, $order, $thisSpan) {
	if ($sort.$order==$thisSpan) {
		return '<span/>';
	}
	return '';
}

function facetsRename ( $facet ) {
	 switch ($facet) {
		case "Xtt-pa-secao" : $facet = __("Seção", 'solrmss');
			break;
		case "Xtt-pa-editorias" : $facet = __("Editorias", 'solrmss');
			break;
		case "Xtt-pa-projetos" : $facet = __("Projetos", 'solrmss');
			break;
		case "Xtt-pa-departamentos" : $facet = __("Departamentos", 'solrmss');
			break;
		case "Xtt-pa-regiao" : $facet = __("Região", 'solrmss');
			break;
		case "Xtt-pa-colecoes" : $facet = __("Coleções", 'solrmss');
			break;
		case "Xtt-pa-midias" : $facet = __("Tipos de Mídia", 'solrmss');
			break;
		case "Xtt-pa-materiais" : $facet = __("Tipos de Material", 'solrmss');
			break;
		case "Xtt-pa-eventos" : $facet = __("Eventos", 'solrmss');
			break;
		case "Xtt-pa-owner" : $facet = __("Sede Proprietária", 'solrmss');
			break;
		case "Xtt-pa-sedes" : $facet = __("Sede Regional", 'solrmss');
			break;
	}
	return $facet;
}

?>

<?php get_header(); ?>
<div id="content">
<div class="solr clearfix container">
  <?php $results = mss_search_results(); ?>  
	<div class="solr1 clearfix">
		<div class="solr_search">
		    <div class="solr_results_headerL">

				<?php if ($results['hits'] && $results['query'] && $results['qtime']) {
				    if ($results['firstresult'] === $results['lastresult']) {
				        printf(__("Displaying result %s of <span id='resultcnt'>%s</span> hits", 'solrmss'), $results['firstresult'], $results['hits']);
				    } else {
				        printf(__("Displaying results %s-%s of <span id='resultcnt'>%s</span> hits", 'solrmss'), $results['firstresult'], $results['lastresult'], $results['hits']);
                    }
				} ?>

			</div>

            <form name="searchbox" method="get" id="searchbox" action="">
			    <input id="qrybox" name="s" type="text" class="solr_field" value="<?php echo $results['query'] ?>"/><input id="searchbtn" type="submit" value="<?php _e('Search', 'solrmss');?>" />
            </form>
            <ul class="solr_facets">
            <li class="solr_active">
				<ol>
					<?php 
					if ($results['facets']['selected']) {
					    foreach( $results['facets']['selected'] as $selectedfacet) {
					        printf("<li><span></span><a href=\"%s\">%s&nbsp;<b>x</b></a></li>", $selectedfacet['removelink'], facetsRename($selectedfacet['name']));
					    }
					} 
					?>
				</ol>
			</li>
			</ul>
            
		</div>

		<?php if($results['dym']) {
			printf(__("<div class='solr_suggest'>Did you mean: <a href='%s'>%s</a> ?</div>", 'solrmss'), $results['dym']['link'], $results['dym']['term']);
		} ?>

	</div>

<?php 
	if ($results['facets']['output']) {
?>
	<div class="solr2">
<?php 
	} else {
?>
	<div class="solr2_nofacets">
<?php 
	}
?>
		<div class="solr_results_header clearfix">

<?php 
	$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'score';
	$order = (isset($_GET['order'])) ? $_GET['order'] : 'desc';
?>
		</div>

		<div class="solr_results">
			
			<?php if ($results['hits'] === "0") {
					printf(__("<div class='solr_noresult'>
															<h2>Sorry, no results were found.</h2>
															<h3>Perhaps you mispelled your search query, or need to try using broader search terms.</h3>
															<p>For example, instead of searching for 'Apple iPhone 3.0 3GS', try something simple like 'iPhone'.</p>
														</div>\n", 'solrmss'));
			} else {
				printf("<ol>\n");
					foreach($results['results'] as $result) {
							printf("<li>");
							printf("<h2><a href='%s'>%s</a></h2>\n", $result['permalink'], $result['title']);
							printf("<span>%s</span>\n", $result['permalink']);
							printf("<p>%s</p>\n", $result['teaser']);
							/*printf("<p>%s <a href='%s'>(comment match)</a></p>\n", $result['teaser'], $result['comment_link']);
							printf("<label> By <a href='%s'>%s</a> in %s %s - <a href='%s'>%s comments</a></label>\n", 
							            $result['authorlink'], 
							            $result['author'], 
							            get_the_category_list( ', ', '', $result['id']), 
							            date('m/d/Y', strtotime($result['date'])), 
							            $result['comment_link'], 
							            $result['numcomments']); */
							printf("</li>\n");
					}
				printf("</ol>\n");
			} ?>

			<?php if ($results['pager']) {
				printf("<div class='solr_pages'>");
				    $itemlinks = array();
				    $pagecnt = 0;
				    $pagemax = 10;
				    $next = '';
				    $prev = '';
				    $found = false;
					foreach($results['pager'] as $pageritm) {
						if ($pageritm['link']) {
						    if ($found && $next === '') {
						        $next = $pageritm['link'];
						    } else if ($found == false) {
						        $prev = $pageritm['link'];
						    }
						    
							$itemlinks[] = sprintf("<a href='%s'>%s</a>", $pageritm['link'], $pageritm['page']);
						} else {
						    $found = true;
							$itemlinks[] = sprintf("<a class='solr_pages_on' href='%s'>%s</a>", $pageritm['link'], $pageritm['page']);
						}
						
						$pagecnt += 1;
						if ($pagecnt == $pagemax) {
						    break;
						}
					}
					
					if ($prev !== '') {
					    printf(__("<a href='%s'>Previous</a>", 'solrmss'), $prev);
					}
					
					foreach ($itemlinks as $itemlink) {
					    echo $itemlink;
					}
					
					if ($next !== '') {
					    printf(__("<a href='%s'>Next</a>", 'solrmss'), $next);
					}
					
				printf("</div>\n");
			} ?>


		</div>	
	</div>

<?php 
	if ($results['facets']['output']) {
?>
	<div class="solr3">
		<ul class="solr_facets">
			<!-- 
            <li class="solr_active">
				<ol>
					<?php 
					if ($results['facets']['selected']) {
					    foreach( $results['facets']['selected'] as $selectedfacet) {
					        printf("<li><span></span><a href=\"%s\">%s<b>x</b></a></li>", $selectedfacet['removelink'], facetsRename($selectedfacet['name'] ));
					    }
					} 
					?>
				</ol>
			</li>
			-->
			
			<?php 
			//if ($results['facets'] && $results['hits'] != 1) {
				foreach($results['facets'] as $facet) {
				    //if (sizeof($facet["items"]) > 1) { #don't display facets with only 1 value
				    if (isset($facet['name'])) {
  						printf("<li>\n<h3>%s</h3>\n", facetsRename($facet['name']));
  						//printf("<li>\n<h3>%s</h3>\n", $facet['name']);
  						mss_print_facet_items($facet["items"], "<ol>", "</ol>", "<li>", "</li>", "<li><ol>", "</ol></li>", "<li>", "</li>");
  						printf("</li>\n");
				    }
					//}
				}
			//}
			?>
		</ul>
	</div>
<?php 
	}
?>
</div>

</div>
<?php get_footer(); ?>
