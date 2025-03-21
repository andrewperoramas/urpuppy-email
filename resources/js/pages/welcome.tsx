import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    return (
        <>
            <div className="grid grid-cols-1 space-y-2">
                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('verify-buyer')}
                    method="post"
                >
                    Verify Buyer
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('verify-breeder')}
                    method="post"
                >
                    Verify Breeder
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('verify-seller')}
                    method="post"
                >
                    Verify Seller
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('admin-contact')}
                    method="post"
                >
                    Admin Contact
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('breeder-account-approved')}
                    method="post"
                >
                    Breeder Account Approved
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('breeder-account-rejected')}
                    method="post"
                >
                    Breeder Account Rejected
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('free-account-mail')}
                    method="post"
                >
                    Free Account Mail
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('new-breeder-special-account-mail')}
                    method="post"
                >
                    New Breeder Special Account Mail
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('premium-account-mail')}
                    method="post"
                >
                    Premium Account Mail
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('renew-breeder-mail')}
                    method="post"
                >
                    Renew Breeder Mail
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('renew-seller-mail')}
                    method="post"
                >
                    Renew Seller Mail
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('subscription-ended')}
                    method="post"
                >
                    Subscription Ended
                </Link>

                <Link
                    className="px-2 py-2 bg-slate-200 text-black cursor-pointer"
                    href={route('support-team-email-response')}
                    method="post"
                >
                    Support Team Email Response
                </Link>
            </div>
        </>
    );
}

