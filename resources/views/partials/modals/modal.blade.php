    <div id="{{ $id ?? 'modal' }}" class="modal fade">
		<div class="modal-dialog {{ $size ?? 'modal-md' }}">
			<div class="modal-content {{ $class ?? '' }}">
				<div class="modal-header blue-check-header">
					<h4 class="modal-title generic-modal-title" style="color: #ffffff;">{{ $title ?? '' }}</h4>
					<button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
				</div>
				{!! $body ?? '<div class="modal-js-content"></div>' !!}						
			</div>
		</div>
	</div>