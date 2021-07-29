<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a
                href="{{ route('organisation.show', [$organisation]) }}">{{ $organisation->name }}</a>
            <small>{{ __('Organisation') }}</small>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div
                    class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                    <h5>
                        {{ $process->name }}
                    </h5>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">


                    <process
                        page_url="{{ route('api.organisation.process.show', [$organisation, $process->id]) }}">
                    </process>



                </div>


            </div>
        </div>
    </div>



</x-app-layout>


{{--
            <h2>Definition</h2>
            <ul>
            <li> <strong>Data Subject</strong> A European Union resident whose personal data is being processed.</li>
            <li><strong>Data Controller</strong> The Data Controller receives Data Subject requests from the Data Subjects and validates them. The Controller submits requests to the Data Processors.</li>
            <li><strong>Data Processor</strong> The Data processor fulfills the request for the Controllers scope.</li>
          </ul>

          <h2>Typical request</h2>
          <ul>
          <li>New Data Subject Request: The data subject files a request to the data controller containing appropriate information. Request may be of any type provisioned in the GDPR text, commonly: access, portability, erasure, rectification.</li>
          <li>Request Distribution: The controller verifies the request and if it will be honored, it is submitted to Processors.</li>
          <li>Request Fulfillment: The Processor fulfills their obligation within the scope of this request. For example, this may include deleting user data in the case of a deletion request.</li>
          <li>Request Status via Callback: The processor will submit status updates to the controller if callbacks are included in the request.</li>
          <li>Communication to the Data Subject: The Controller communicates the results to the data subject.</li>
        </ul>
        --}}
