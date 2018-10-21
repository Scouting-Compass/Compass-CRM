<div class="list-group mb-4">
    <a href="{{ route('notifications.index') }}" class="list-group-item list-group-item-action">
        Unread notifications
    </a>

    <a href="{{ route('notifications.index', ['type' => 'all']) }}" class="list-group-item list-group-item-action">
        All notifications
    </a>
</div>