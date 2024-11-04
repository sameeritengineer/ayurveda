Hello {{ $data['order']->name }},

Your order #{{ $data['order']->id }} status has been updated to: {{ config("order_status.order_status_admin.{$data['status']}.status") }}.

Regards,
Mleyered