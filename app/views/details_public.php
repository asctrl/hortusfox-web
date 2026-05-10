<div class="margin-vertical" style="display: flex; justify-content: flex-end; gap: 0.75rem;">
    @if ($user)
        <a class="button is-link" href="{{ $details_url }}">{{ __('app.edit_plant') }}</a>
    @else
        <a class="button is-link" href="{{ $login_url }}">{{ __('app.login') }}</a>
    @endif
</div>

<div class="plant-details-title">
    <h1>{{ $plant->get('name') }}</h1>
    <h2>{{ $plant_ident }}</h2>
</div>

@if (($edit_user_name !== '') && ($edit_user_when !== ''))
<div class="margin-vertical is-default-text-color">
    {{ __('app.last_edited_by', ['name' => $edit_user_name, 'when' => $edit_user_when]) }}
</div>
@endif

@if ($plant->get('health_state') !== 'in_good_standing')
<div class="plant-warning">{{ __('app.plant_warning', ['reason' => __('app.' . $plant->get('health_state'))]) }}</div>
@endif

<div class="columns plant-column">
    <div class="column is-two-third">
        <table>
            <thead>
                <tr>
                    <td class="is-half-percent">{{ __('app.attribute') }}</td>
                    <td>{{ __('app.value') }}</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><strong>{{ __('app.name') }}</strong></td>
                    <td>{{ $plant->get('name') }}</td>
                </tr>

                <tr>
                    <td><strong>{{ __('app.scientific_name') }}</strong></td>
                    <td>
                        @if ($plant->get('scientific_name'))
                            {{ $plant->get('scientific_name') }}
                        @else
                            <span class="is-not-available">{{ __('app.none') }}</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td><strong>{{ __('app.location') }}</strong></td>
                    <td>{{ ((!$plant->get('history')) ? LocationsModel::getNameById($plant->get('location')) : app('history_name')) }}</td>
                </tr>

                @if (plant_attr('last_watered'))
                <tr>
                    <td><strong>{{ __('app.last_watered') }}</strong></td>
                    <td>{{ ($plant->get('last_watered')) ? date('Y-m-d', strtotime($plant->get('last_watered'))) : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('last_repotted'))
                <tr>
                    <td><strong>{{ __('app.last_repotted') }}</strong></td>
                    <td>{{ ($plant->get('last_repotted')) ? date('Y-m-d', strtotime($plant->get('last_repotted'))) : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('last_fertilised'))
                <tr>
                    <td><strong>{{ __('app.last_fertilised') }}</strong></td>
                    <td>{{ ($plant->get('last_fertilised')) ? date('Y-m-d', strtotime($plant->get('last_fertilised'))) : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('lifespan'))
                <tr>
                    <td><strong>{{ __('app.lifespan') }}</strong></td>
                    <td>{{ ($plant->get('lifespan')) ? __('app.' . $plant->get('lifespan')) : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('hardy'))
                <tr>
                    <td><strong>{{ __('app.hardy') }}</strong></td>
                    <td>
                        @if (!is_null($plant->get('hardy')))
                            {{ ($plant->get('hardy')) ? __('app.yes') : __('app.no') }}
                        @else
                            {{ __('app.none') }}
                        @endif
                    </td>
                </tr>
                @endif

                @if (plant_attr('cutting_month'))
                <tr>
                    <td><strong>{{ __('app.cutting_month') }}</strong></td>
                    <td>{!! ($plant->get('cutting_month')) ? UtilsModule::getMonthList()[$plant->get('cutting_month')] : __('app.none') !!}</td>
                </tr>
                @endif

                @if (plant_attr('date_of_purchase'))
                <tr>
                    <td><strong>{{ __('app.date_of_purchase') }}</strong></td>
                    <td>{{ ($plant->get('date_of_purchase')) ? date('Y-m-d', strtotime($plant->get('date_of_purchase'))) : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('humidity'))
                <tr>
                    <td><strong>{{ __('app.humidity') }}</strong></td>
                    <td>{{ ($plant->get('humidity')) ? $plant->get('humidity') . '%' : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('light_level'))
                <tr>
                    <td><strong>{{ __('app.light_level') }}</strong></td>
                    <td>{{ ($plant->get('light_level')) ? __('app.' . $plant->get('light_level')) : __('app.none') }}</td>
                </tr>
                @endif

                @if (plant_attr('health_state'))
                <tr>
                    <td><strong>{{ __('app.health_state') }}</strong></td>
                    <td>{{ ($plant->get('health_state')) ? __('app.' . $plant->get('health_state')) : __('app.none') }}</td>
                </tr>
                @endif

                @foreach ($custom_attributes as $custom_attribute)
                    <tr>
                        <td><strong>{{ $custom_attribute->label }}</strong></td>
                        <td>
                            @if (!is_null($custom_attribute->content))
                                @if (is_bool($custom_attribute->content))
                                    {{ ($custom_attribute->content) ? __('app.yes') : __('app.no') }}
                                @else
                                    {{ $custom_attribute->content }}
                                @endif
                            @else
                                {{ __('app.none') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="column is-one-third">
        <div class="plant-photo" style="background-image: url('{{ abs_photo($plant->get('photo')) }}');">
            <div class="plant-photo-overlay">
                <div class="plant-photo-view is-pointer" onclick="window.vue.showImagePreview('{{ str_replace('_thumb', '', abs_photo($plant->get('photo'))) }}');"><i class="fas fa-expand fa-lg"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="columns plant-column">
    <div class="column is-full">
        <div class="plant-tags">
            <div class="plant-tags-content">
                @if ((is_countable($tags)) && (count($tags) > 0))
                    @foreach ($tags as $tag)
                        <div class="plant-tags-item">{{ $tag }}</div>
                    @endforeach
                @else
                    <strong class="is-default-text-color">{{ __('app.no_tags_specified') }}</strong>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="columns plant-column">
    <div class="column is-full">
        <div class="plant-notes">
            <div class="plant-notes-content">
                @if ((is_string($plant->get('notes'))) && (strlen($plant->get('notes')) > 0))
                    <pre>{{ $plant->get('notes') }}</pre>
                @else
                    <span class="is-not-available">{{ __('app.no_notes_specified') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

@if (count($photos) > 0)
<div class="columns plant-column">
    <div class="column is-full">
        <div class="plant-gallery">
            <div class="plant-gallery-title">{{ __('app.photos') }}</div>

            <div class="plant-gallery-photos">
                @foreach ($photos as $photo)
                    <div class="plant-gallery-item">
                        <div class="plant-gallery-item-header">
                            <div class="plant-gallery-item-header-label">{{ $photo->get('label') }}</div>
                        </div>

                        <div class="plant-gallery-item-photo">
                            <a href="{{ abs_photo($photo->get('original')) }}" target="_blank">
                                <div class="plant-gallery-item-photo-overlay"></div>

                                <img class="plant-gallery-item-photo-image" src="{{ abs_photo($photo->get('thumb')) }}" alt="photo"/>
                            </a>
                        </div>

                        <div class="plant-gallery-item-footer">
                            {{ (new Carbon($photo->get('created_at')))->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
