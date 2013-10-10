
	
	<div class="sidebar-1-wrap">
		<div class="top-bar">Project Details</div>
		<div class="sidebar-content">
				<h3>{{ $project->dealer }}</h3>
				<p>{{ $project->title }}</p>
			<p>
				Client: <span>{{ $project->client }}</span><br>
				Dealer: <span>{{ $project->dealer }}</span><br>
				Proposal ID: <span>{{ $project->proposal_id }}</span><br>
				Work Type: <span>{{ $project->work_type }}</span>
			</p>	
				{{ link_to_route('projects.edit', 'Update Details', $project->id, array('class' => 'purple-btn')) }}
		</div>
	</div>	

