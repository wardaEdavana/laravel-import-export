# Pagination

## Contents

- [The Basics](#the-basics)
- [Using The Query Builder](#using-the-query-builder)
- [Appending To Pagination Links](#appending-to-pagination-links)
- [Creating Paginators Manually](#creating-paginators-manually)
- [Pagination Styling](#pagination-styling)

<a name="the-basics"></a>
## The Basics

Laravel's paginator was designed to reduce the clutter of implementing pagination.

<a name="using-the-query-builder"></a>
## Using The Query Builder

Let's walk through a complete example of paginating using the [Fluent Query Builder](/docs/database/fluent):

#### Pull the paginated results from the query:

	$orders = DB::table('orders')->paginate($per_page);

#### Display the results in a view:

	<?php foreach ($orders->results as $order): ?>
		<?php echo $order->id; ?>
	<?php endforeach; ?>

#### Generate the pagination links:

	<?php echo $orders->links(); ?>

The links method will create an intelligent, sliding list of page links that looks something like this:

	Previous 1 2 ... 24 25 26 27 28 29 30 ... 78 79 Next

The Paginator will automatically determine which page you're on and update the results and links accordingly.

It's also possible to generate "next" and "previous" links:

#### Generating simple "previous" and "next" links:

	<?php echo $orders->previous().' '.$orders->next(); ?>

*Further Reading:*

- *[Fluent Query Builder](/docs/database/fluent)*

<a name="appending-to-pagination-links"></a>
## Appending To Pagination Links

You may need to add more items to the pagination links' query strings, such as the column your are sorting by.

#### Appending to the query string of pagination links:

	<?php echo $orders->appends(array('sort' => 'votes'))->links();

This will generate URLs that look something like this:

	http://example.com/something?page=2&sort=votes

<a name="creating-paginators-manually"></a>
## Creating Paginators Manually

Sometimes you may need to create a Paginator instance manually, without using the query builder. Here's how:

#### Creating a Paginator instance manually:

	$orders = Paginator::make($orders, $total, $per_page);

<a name="pagination-styling"></a>
## Pagination Styling

All pagination link elements can be style using CSS classes. Here is an example of the HTML elements generated by the links method:

    <div class="pagination">
        <a href="foo" class="previous_page">Previous</a>

        <a href="foo">1</a>
        <a href="foo">2</a>

        <span class="dots">...</span>

        <a href="foo">11</a>
        <a href="foo">12</a>

        <span class="current">13</span>

        <a href="foo">14</a>
        <a href="foo">15</a>

        <span class="dots">...</span>

        <a href="foo">25</a>
        <a href="foo">26</a>

        <a href="foo" class="next_page">Next</a>
    </div>

When you are on the first page of results, the "Previous" link will be disabled. Likewise, the "Next" link will be disabled when you are on the last page of results. The generated HTML will look like this:

	<span class="disabled prev_page">Previous</span>