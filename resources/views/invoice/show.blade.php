<x-app-layout>
  <!-- Template: https://codepen.io/unwrappedhq/pen/ExopGMV -->
  <section class="py-12">
    <div class="max-w-5xl mx-auto bg-white">
      <article class="overflow-hidden">
        <div class="bg-base-200 py-8 px-14 rounded-md">
          <div class="flex flex-col items-center mb-8 text-slate-700">
            <div class="flex flex-col gap-4 justify-center items-center">
              <x-application-logo class="w-16 h-14" />
              <p class="text-xl font-extrabold tracking-tight uppercase font-body">{{ config('app.name') }}</p>
            </div>
          </div>
          <div class="p-9">
            <div class="flex justify-center w-full">
              <div class="grid grid-flow-col justify-between justify-items-center w-full gap-12">
                <div class="text-sm font-light text-slate-500 text-right">
                  <p class="text-sm font-normal text-slate-700">{{ __('invoice.shipped_to') }}</p>
                  <p>{{ $user->name }}</p>
                  <p>{{ $address }}</p>
                  <p>{{ $city }}</p>
                  <p>{{ $zip }}</p>
                </div>
                <div class="text-sm font-light text-slate-500">
                  <p class="text-sm font-normal text-slate-700">{{ __('invoice.invoice_number') }}</p>
                  <p class="text-center">{{ $id }}</p>

                  <p class="mt-2 text-sm font-normal text-slate-700">{{ __('invoice.date_of_issue') }}</p>
                  <p>{{ $date }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="p-9">
            <div class="flex flex-col mx-0 mt-8">
              <table class="min-w-full divide-y divide-slate-500 printable">
                <thead>
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-sm text-right font-normal text-slate-700 sm:pl-6 md:pl-0">
                      {{ __('app.description') }}
                    </th>
                    <th scope="col" class="hidden py-3.5 px-3 text-sm text-center font-normal text-slate-700 sm:table-cell">
                      {{ __('app.quantity') }}
                    </th>
                    <th scope="col" class="py-3.5 pl-3 pr-4 text-sm text-left font-normal text-slate-700 sm:pr-6 md:pr-0">
                      {{ __('app.price') }}
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr class="border-b border-slate-200">
                    <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0 text-right">
                      <div class="font-medium text-slate-700">{{ $order->product->name }}</div>
                      <div class="mt-0.5 text-slate-500 sm:hidden">x{{ $order->qty }}</div>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-slate-500 sm:table-cell text-center">
                      {{ $order->qty }}
                    </td>
                    <td dir="auto" class="py-4 pl-3 pr-4 text-sm text-slate-500 sm:pr-6 md:pr-0 text-left">
                      {{ $order->price }} <span class="text-xs">{{ $currency }}</span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th scope="row" colspan="2" class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                      {{ __('app.subtotal') }}
                    </th>
                    <th scope="row" class="pt-6 pl-4 pr-3 text-sm font-light text-right text-slate-500 sm:hidden">
                      {{ __('app.subtotal') }}
                    </th>
                    <td class="pt-6 pl-3 pr-4 text-sm text-left text-slate-500 sm:pr-6 md:pr-0" dir="auto">
                      {{ $subtotal }} <span class="text-xs">{{ $currency }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" colspan="2" class="hidden pt-4 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                      {{ __('app.tax') }} — %{{ $tax * 100 }}
                    </th>
                    <th scope="row" class="pt-4 pl-4 pr-3 text-sm font-light text-right text-slate-500 sm:hidden">
                      {{ __('app.tax') }} — %{{ $tax * 100 }}
                    </th>
                    <td class="pt-4 pl-3 pr-4 text-sm text-left text-slate-500 sm:pr-6 md:pr-0" dir="auto">
                      {{ round($subtotal * $tax, 2) }} <span class="text-xs">{{ $currency }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" colspan="2" class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                      {{ __('app.total') }}
                    </th>
                    <th scope="row" class="pt-4 pl-4 pr-3 text-sm font-normal text-right text-slate-700 sm:hidden">
                      {{ __('app.total') }}
                    </th>
                    <td class="pt-4 pl-3 pr-4 text-sm font-normal text-left text-slate-700 sm:pr-6 md:pr-0">
                      {{ round($subtotal * (1 + $tax), 2) }} <span class="text-xs">{{ $currency }}</span>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          {{-- <div class="mt-48 p-9">
            <div class="border-t pt-9 border-slate-200">
              <div class="text-sm font-light text-slate-700">
                <p>
                  Payment terms are 14 days. Please be aware that according to the
                  Late Payment of Unwrapped Debts Act 0000, freelancers are
                  entitled to claim a 00.00 late fee upon non-payment of debts
                  after this time, at which point a new invoice will be submitted
                  with the addition of this fee. If payment of the revised invoice
                  is not received within a further 14 days, additional interest
                  will be charged to the overdue account and a statutory rate of
                  8% plus Bank of England base of 0.5%, totalling 8.5%. Parties
                  cannot contract out of the Act’s provisions.
                </p>
              </div>
            </div>
          </div> --}}
        </div>
      </article>
    </div>
  </section>
</x-app-layout>
