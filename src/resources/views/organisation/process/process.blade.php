<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a
                href="{{ route('organisation.show', [$organisation]) }}">{{ $organisation->name }}</a>
            <small class="
                text-gray-500">{{ __('Organisation') }}</small>
    </x-slot>

    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap justify-center">

            <div class="md:w-3/4 pr-4 pl-4">
                <div
                    class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">

                    <div
                        class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        <h5>
                            {{ $process->name }}
                        </h5>
                    </div>

                    <div class="flex-auto p-6">


                        <div class="">
                            <div
                                class="opacity-0 opacity-100 block active">
                                <p>
                                    {{ $process->description }}
                                </p>

                            </div>

                        </div>
                    </div>


                    <div class="flex-auto p-6">




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




                    </div>
                </div>
            </div>

            <div class="md:w-1/4 pr-4 pl-4">

                <div
                    class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div
                        class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        Adding tag
                    </div>
                    <div class="flex-auto p-6">

                        <input type="text" name="" value="">
                        <input type="text" name="" value="">
                        <button type="button" name="button"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600">add</button>
                    </div>

                </div>


            </div>

        </div>
    </div>
</x-app-layout>
