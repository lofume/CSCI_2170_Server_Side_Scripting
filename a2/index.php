<?php
/* 
 * Homepage for Assignment 2 in CSCI 2170, Fall 2021
 * Author: Raghav V. Sampangi (raghav@cs.dal.ca)
 * Date: 21 September 2021
 */

/* 
 * This file is edited by Lynda Ofume for the work on Assignment 2.
 */

require_once "includes/db.php";
?>

<?php require_once "includes/header.php";?>

	<!-- Main content (or content of focus/importance) of the web page -->
	<main id="homepg-main-content">
		<section id="search-section">
			<h2>Search for stuff</h2>

			<form id="search-form" method="post" action="">
				<input type="text" id="sf-keywords" name="sf-keywords-input" placeholder="What would you like to search?">
				<br></br>

				<label for="drop-down-menu">Choose search options in the dropdown list below (default is search all articles):</label>
					<br></br>
					<select name="articles-by" id="select-by">
						<option value="show-all-articles">Show all articles</option>
						<option value="Search-by-author">Search by author name</option>
						<option value="article-title">Search by article title</option>
						<option value="txt-content">Search by article text content</option>
					</select>
				<br></br>
				<button class="submit">Search Results</button>
			</form>

			<section id="search-results">

				

         

			</section>


			<?php
			// IMPLEMENT THIS FEATURE
			// Hide this help info section below when search results are ready.
			// Show the heading otherwise.
			?>
			<section id="search-help-info">
				<h3 id="help-info-display" class="help-text">Help section: How do I use this search? (click to show/hide help info)</h3>
				<ul id="search-help">
					<li>You can use the form below to search for Jedi articles: either based on words/characters in the title, the content of the article, or by author name.</li>
					<li>Based on the keywords/characters you enter, the search engine will find articles.</li>
					<li>When you click on the article title, the article will open in article.php, showing just the article.</li>
					<li>You can also click on show all articles to see a list of all articles in the form of a table.</li>
				</ul>
			</section>

			<?php
				// IMPLEMENT THIS FEATURE
				// Check to see which option is selected and show corresponding results
				
				require_once "includes/all-articles";
				require_once "includes/by-author";
				require_once "includes/by-content";
				require_once "includes/by-title";
					



				?>
			<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		</section>
	</main>

<?php
	require_once "includes/footer.php";
?>