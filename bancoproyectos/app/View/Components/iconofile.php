<?php

namespace App\View\Components;

use Illuminate\View\Component;

class iconofile extends Component
{

    public $type;
    public $size;
    public $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$size)
    {
        $this->type = $type;

        $this->size = $size;

        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        switch ($this->type) {
            case "application/pdf":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  xmlns="http://www.w3.org/2000/svg"aria-label="PDF" role="img"viewBox="0 0 512 512"><rect width="512" height="512"rx="15%"fill="#c80a0a"/><path fill="#fff" d="M413 302c-9-10-29-15-56-15-16 0-33 2-53 5a252 252 0 0 1-52-69c10-30 17-59 17-81 0-17-6-44-30-44-7 0-13 4-17 10-10 18-6 58 13 100a898 898 0 0 1-50 117c-53 22-88 46-91 65-2 9 4 24 25 24 31 0 65-45 91-91a626 626 0 0 1 92-24c38 33 71 38 87 38 32 0 35-23 24-35zM227 111c8-12 26-8 26 16 0 16-5 42-15 72-18-42-18-75-11-88zM100 391c3-16 33-38 80-57-26 44-52 72-68 72-10 0-13-9-12-15zm197-98a574 574 0 0 0-83 22 453 453 0 0 0 36-84 327 327 0 0 0 47 62zm13 4c32-5 59-4 71-2 29 6 19 41-13 33-23-5-42-18-58-31z"/></svg>';
                break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
            case "application/vnd.ms-excel":
                case "application/msexcel":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#ECEFF1;" d="M496,432.011H272c-8.832,0-16-7.168-16-16s0-311.168,0-320s7.168-16,16-16h224 c8.832,0,16,7.168,16,16v320C512,424.843,504.832,432.011,496,432.011z"/> <g> <path style="fill:#388E3C;" d="M336,176.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,176.011,336,176.011z"/> <path style="fill:#388E3C;" d="M336,240.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,240.011,336,240.011z"/> <path style="fill:#388E3C;" d="M336,304.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,304.011,336,304.011z"/> <path style="fill:#388E3C;" d="M336,368.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,368.011,336,368.011z"/> <path style="fill:#388E3C;" d="M432,176.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,176.011,432,176.011z"/> <path style="fill:#388E3C;" d="M432,240.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,240.011,432,240.011z"/> <path style="fill:#388E3C;" d="M432,304.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,304.011,432,304.011z"/> <path style="fill:#388E3C;" d="M432,368.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,368.011,432,368.011z"/> </g> <path style="fill:#2E7D32;" d="M282.208,19.691c-3.648-3.04-8.544-4.352-13.152-3.392l-256,48C5.472,65.707,0,72.299,0,80.011v352 c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.952,0.288,2.944,0.288c3.712,0,7.328-1.28,10.208-3.68 c3.68-3.04,5.792-7.584,5.792-12.32v-448C288,27.243,285.888,22.731,282.208,19.691z"/> <path style="fill:#FAFAFA;" d="M220.032,309.483l-50.592-57.824l51.168-65.792c5.44-6.976,4.16-17.024-2.784-22.464 c-6.944-5.44-16.992-4.16-22.464,2.784l-47.392,60.928l-39.936-45.632c-5.856-6.72-15.968-7.328-22.56-1.504 c-6.656,5.824-7.328,15.936-1.504,22.56l44,50.304L83.36,310.187c-5.44,6.976-4.16,17.024,2.784,22.464 c2.944,2.272,6.432,3.36,9.856,3.36c4.768,0,9.472-2.112,12.64-6.176l40.8-52.48l46.528,53.152 c3.168,3.648,7.584,5.504,12.032,5.504c3.744,0,7.488-1.312,10.528-3.968C225.184,326.219,225.856,316.107,220.032,309.483z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';
                break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
            case "	application/msword":
            case "application/vnd.ms-word":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#ECEFF1;" d="M496,432.004H272c-8.832,0-16-7.136-16-16s0-311.168,0-320s7.168-16,16-16h224 c8.832,0,16,7.168,16,16v320C512,424.868,504.832,432.004,496,432.004z"/> <g> <path style="fill:#1976D2;" d="M432,176.004H272c-8.832,0-16-7.136-16-16s7.168-16,16-16h160c8.832,0,16,7.168,16,16 S440.832,176.004,432,176.004z"/> <path style="fill:#1976D2;" d="M432,240.004H272c-8.832,0-16-7.136-16-16s7.168-16,16-16h160c8.832,0,16,7.168,16,16 S440.832,240.004,432,240.004z"/> <path style="fill:#1976D2;" d="M432,304.004H272c-8.832,0-16-7.136-16-16c0-8.864,7.168-16,16-16h160c8.832,0,16,7.168,16,16 S440.832,304.004,432,304.004z"/> <path style="fill:#1976D2;" d="M432,368.004H272c-8.832,0-16-7.136-16-16s7.168-16,16-16h160c8.832,0,16,7.168,16,16 S440.832,368.004,432,368.004z"/> </g> <path style="fill:#1565C0;" d="M282.208,19.716c-3.648-3.072-8.544-4.352-13.152-3.424l-256,48C5.504,65.7,0,72.324,0,80.004v352 c0,7.68,5.472,14.304,13.056,15.712l256,48c0.992,0.192,1.952,0.288,2.944,0.288c3.712,0,7.328-1.28,10.208-3.68 c3.68-3.04,5.792-7.552,5.792-12.32v-448C288,27.236,285.888,22.756,282.208,19.716z"/> <path style="fill:#FAFAFA;" d="M207.904,337.796c-0.832,7.328-6.592,13.184-13.92,14.08c-0.672,0.096-1.312,0.128-1.984,0.128 c-6.592,0-12.608-4.096-14.976-10.368L144,253.572l-33.024,88.064c-2.56,6.848-9.28,11.04-16.704,10.272 c-7.264-0.768-13.088-6.4-14.112-13.664l-16-112c-1.248-8.704,4.832-16.832,13.568-18.08c8.768-1.28,16.864,4.832,18.112,13.568 l7.136,50.048l26.016-69.408c4.672-12.48,25.28-12.48,29.984,0l24.512,65.344l8.608-77.504c0.992-8.768,9.12-15.072,17.664-14.144 c8.8,1.024,15.104,8.928,14.144,17.696L207.904,337.796z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';
                break;
            case "application/vnd.openxmlformats-officedocument.presentationml.presentation":
            case "application/vnd.ms-powerpoint":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 	"/> <path style="fill:#CC4B4C;" d="M19.514,33.324L19.514,33.324c-0.348,0-0.682-0.113-0.967-0.326 c-1.041-0.781-1.181-1.65-1.115-2.242c0.182-1.628,2.195-3.332,5.985-5.068c1.504-3.296,2.935-7.357,3.788-10.75 c-0.998-2.172-1.968-4.99-1.261-6.643c0.248-0.579,0.557-1.023,1.134-1.215c0.228-0.076,0.804-0.172,1.016-0.172 c0.504,0,0.947,0.649,1.261,1.049c0.295,0.376,0.964,1.173-0.373,6.802c1.348,2.784,3.258,5.62,5.088,7.562 c1.311-0.237,2.439-0.358,3.358-0.358c1.566,0,2.515,0.365,2.902,1.117c0.32,0.622,0.189,1.349-0.39,2.16 c-0.557,0.779-1.325,1.191-2.22,1.191c-1.216,0-2.632-0.768-4.211-2.285c-2.837,0.593-6.15,1.651-8.828,2.822 c-0.836,1.774-1.637,3.203-2.383,4.251C21.273,32.654,20.389,33.324,19.514,33.324z M22.176,28.198 c-2.137,1.201-3.008,2.188-3.071,2.744c-0.01,0.092-0.037,0.334,0.431,0.692C19.685,31.587,20.555,31.19,22.176,28.198z M35.813,23.756c0.815,0.627,1.014,0.944,1.547,0.944c0.234,0,0.901-0.01,1.21-0.441c0.149-0.209,0.207-0.343,0.23-0.415 c-0.123-0.065-0.286-0.197-1.175-0.197C37.12,23.648,36.485,23.67,35.813,23.756z M28.343,17.174 c-0.715,2.474-1.659,5.145-2.674,7.564c2.09-0.811,4.362-1.519,6.496-2.02C30.815,21.15,29.466,19.192,28.343,17.174z M27.736,8.712c-0.098,0.033-1.33,1.757,0.096,3.216C28.781,9.813,27.779,8.698,27.736,8.712z"/> <path style="fill:#CC4B4C;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/> <g> <path style="fill:#FFFFFF;" d="M17.385,53h-1.641V42.924h2.898c0.428,0,0.852,0.068,1.271,0.205 c0.419,0.137,0.795,0.342,1.128,0.615c0.333,0.273,0.602,0.604,0.807,0.991s0.308,0.822,0.308,1.306 c0,0.511-0.087,0.973-0.26,1.388c-0.173,0.415-0.415,0.764-0.725,1.046c-0.31,0.282-0.684,0.501-1.121,0.656 s-0.921,0.232-1.449,0.232h-1.217V53z M17.385,44.168v3.992h1.504c0.2,0,0.398-0.034,0.595-0.103 c0.196-0.068,0.376-0.18,0.54-0.335c0.164-0.155,0.296-0.371,0.396-0.649c0.1-0.278,0.15-0.622,0.15-1.032 c0-0.164-0.023-0.354-0.068-0.567c-0.046-0.214-0.139-0.419-0.28-0.615c-0.142-0.196-0.34-0.36-0.595-0.492 c-0.255-0.132-0.593-0.198-1.012-0.198H17.385z"/> <path style="fill:#FFFFFF;" d="M32.219,47.682c0,0.829-0.089,1.538-0.267,2.126s-0.403,1.08-0.677,1.477s-0.581,0.709-0.923,0.937 s-0.672,0.398-0.991,0.513c-0.319,0.114-0.611,0.187-0.875,0.219C28.222,52.984,28.026,53,27.898,53h-3.814V42.924h3.035 c0.848,0,1.593,0.135,2.235,0.403s1.176,0.627,1.6,1.073s0.74,0.955,0.95,1.524C32.114,46.494,32.219,47.08,32.219,47.682z M27.352,51.797c1.112,0,1.914-0.355,2.406-1.066s0.738-1.741,0.738-3.09c0-0.419-0.05-0.834-0.15-1.244 c-0.101-0.41-0.294-0.781-0.581-1.114s-0.677-0.602-1.169-0.807s-1.13-0.308-1.914-0.308h-0.957v7.629H27.352z"/> <path style="fill:#FFFFFF;" d="M36.266,44.168v3.172h4.211v1.121h-4.211V53h-1.668V42.924H40.9v1.244H36.266z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';
                break;
            case "image/png":
                case "image/jpeg":
                    case "image/jpgg":
                    $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" enable-background="new 0 0 48 48"> <path fill="#F57C00" d="M40,41H8c-2.2,0-4-1.8-4-4V11c0-2.2,1.8-4,4-4h32c2.2,0,4,1.8,4,4v26C44,39.2,42.2,41,40,41z"/> <circle fill="#FFF9C4" cx="35" cy="16" r="3"/> <polygon fill="#942A09" points="20,16 9,32 31,32"/> <polygon fill="#BF360C" points="31,22 23,32 39,32"/> </svg>';
                    break;
            case "application/x-rar":
               case "application/zip":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <style type="text/css"> .st0{fill:#74006F;} .st1{fill:#FCB714;} .st2{opacity:6.000000e-02;} .st3{fill:#17292D;} </style> <title>zip-flat</title> <path class="st0" d="M460.8,153.6V448c0,35.3-28.7,64-64,64H115.2c-35.3,0-64-28.7-64-64V64c0-35.3,28.7-64,64-64h192.1l33.4,33.4 L460.8,153.6z"/> <path class="st1" d="M460.8,153.6h-89.6c-35.3,0-64-28.7-64-64V0h0.1L460.8,153.6z"/> <g class="st2"> <path class="st3" d="M371.2,153.6c-35.3,0-64-28.7-64-64v25.6c0,35.3,28.7,64,64,64l0,0h89.6v-25.6H371.2z"/> </g> <rect x="153.6" y="25.6" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="51.2" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="76.8" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="102.4" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="128" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="153.6" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="179.2" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="204.8" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="230.4" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="256" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="281.6" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="307.2" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="332.8" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="358.4" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="384" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="409.6" class="st1" width="25.6" height="25.6"/> <rect x="153.6" y="435.2" class="st1" width="25.6" height="25.6"/> <rect x="179.2" y="460.8" class="st1" width="25.6" height="25.6"/> </svg>';
                break;
            case "image/x-dwg":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 	"/> <path style="fill:#8697CB;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/> <g> <path style="fill:#FFFFFF;" d="M19.947,47.682c0,0.829-0.089,1.538-0.267,2.126s-0.403,1.08-0.677,1.477s-0.581,0.709-0.923,0.937 s-0.672,0.398-0.991,0.513c-0.319,0.114-0.611,0.187-0.875,0.219C15.95,52.984,15.754,53,15.627,53h-3.814V42.924h3.035 c0.848,0,1.593,0.135,2.235,0.403s1.176,0.627,1.6,1.073s0.74,0.955,0.95,1.524C19.842,46.494,19.947,47.08,19.947,47.682z M15.08,51.797c1.112,0,1.914-0.355,2.406-1.066s0.738-1.741,0.738-3.09c0-0.419-0.05-0.834-0.15-1.244 c-0.101-0.41-0.294-0.781-0.581-1.114s-0.677-0.602-1.169-0.807s-1.13-0.308-1.914-0.308h-0.957v7.629H15.08z"/> <path style="fill:#FFFFFF;" d="M35,42.924l-2.721,10.131h-2.133l-1.654-7.602l-1.764,7.602h-2.146l-2.557-10.131h1.859 l1.777,8.695l1.914-8.695h1.859l1.777,8.695l1.928-8.695H35z"/> <path style="fill:#FFFFFF;" d="M44.57,47.805v3.896c-0.21,0.265-0.444,0.48-0.704,0.649s-0.533,0.308-0.82,0.417 S42.463,52.954,42.157,53s-0.608,0.068-0.909,0.068c-0.602,0-1.155-0.109-1.661-0.328s-0.948-0.542-1.326-0.971 c-0.378-0.429-0.675-0.966-0.889-1.613c-0.214-0.647-0.321-1.395-0.321-2.242s0.107-1.593,0.321-2.235 c0.214-0.643,0.51-1.178,0.889-1.606c0.378-0.429,0.822-0.754,1.333-0.978s1.062-0.335,1.654-0.335 c0.547,0,1.058,0.091,1.531,0.273s0.897,0.456,1.271,0.82l-1.135,1.012c-0.219-0.265-0.47-0.456-0.752-0.574 s-0.574-0.178-0.875-0.178c-0.337,0-0.658,0.063-0.964,0.191s-0.579,0.344-0.82,0.649s-0.431,0.699-0.567,1.183 c-0.137,0.483-0.21,1.075-0.219,1.777c0.009,0.684,0.08,1.276,0.212,1.777c0.132,0.501,0.314,0.911,0.547,1.23 s0.497,0.556,0.793,0.711s0.608,0.232,0.937,0.232c0.101,0,0.234-0.007,0.403-0.021s0.337-0.036,0.506-0.068 s0.33-0.075,0.485-0.13s0.269-0.132,0.342-0.232v-2.488h-1.709v-1.121H44.57z"/> </g> <rect x="12.5" y="13" style="fill:#C8BDB8;" width="15" height="15.065"/> <rect x="34.5" y="14" style="fill:#ADA29E;" width="2" height="7"/> <rect x="34.5" y="29" style="fill:#ADA29E;" width="2" height="7"/> <path style="fill:#ADA29E;" d="M40.5,30h-10V20h10V30z M32.5,28h6v-6h-6V28z"/> <rect x="39.5" y="24" style="fill:#ADA29E;" width="7" height="2"/> <rect x="24.5" y="24" style="fill:#ADA29E;" width="7" height="2"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';
                break;

            case "application/x-msdownload":
            case "application/octet-stream":
                $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 	"/> <path style="fill:#9777A8;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/> <g> <path style="fill:#FFFFFF;" d="M17.082,44.168v3.172h4.211v1.121h-4.211v3.295h4.635V53h-6.303V42.924h6.303v1.244H17.082z"/> <path style="fill:#FFFFFF;" d="M28.58,48.105L31.137,53h-1.9l-1.6-3.801H27.5L25.777,53h-1.9l2.557-4.895l-2.721-5.182h1.873 l1.777,4.102H27.5l1.928-4.102h1.873L28.58,48.105z"/> <path style="fill:#FFFFFF;" d="M35.266,44.168v3.172h4.211v1.121h-4.211v3.295H39.9V53h-6.303V42.924H39.9v1.244H35.266z"/> </g> <path style="fill:#9777A8;" d="M33.5,32c-0.099,0-0.2-0.015-0.299-0.046c-0.527-0.165-0.821-0.726-0.656-1.253l5-16 c0.165-0.527,0.726-0.821,1.253-0.656c0.527,0.165,0.821,0.726,0.656,1.253l-5,16C34.321,31.726,33.926,32,33.5,32z"/> <circle style="fill:#9777A8;" cx="29" cy="19.5" r="1.5"/> <circle style="fill:#9777A8;" cx="29" cy="26.5" r="1.5"/> <path style="fill:#9777A8;" d="M23.5,30h-2c-3.86,0-7-3.14-7-7s3.14-7,7-7h2c0.552,0,1,0.448,1,1s-0.448,1-1,1h-2 c-2.757,0-5,2.243-5,5s2.243,5,5,5h2c0.552,0,1,0.448,1,1S24.052,30,23.5,30z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';
                break;
            
           default:
           $this->icon = '<svg  width="' . $this->size . 'px" height="' . $this->size . 'px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve"> <g> <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/> <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 	"/> <path style="fill:#C8BDB8;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/> <circle style="fill:#FFFFFF;" cx="18.5" cy="47" r="3"/> <circle style="fill:#FFFFFF;" cx="28.5" cy="47" r="3"/> <circle style="fill:#FFFFFF;" cx="38.5" cy="47" r="3"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>';
           break;

        }

        return view('components.iconofile');
    }
}
