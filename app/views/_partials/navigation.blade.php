<div class="top-bar">
	{{ link_to_route('projects.index', 'My Projects') }}
	{{ link_to_route('invoices.index', 'My Invoices') }}
	{{ link_to_route('worktypes.index', 'My Rates') }}
	{{ link_to_action('SessionsController@destroy', 'Log Out') }}
</div>